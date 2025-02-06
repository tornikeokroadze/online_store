<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Orders;
use App\Models\Products;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        $user = auth()->user();

        $cart = Cart::where('users_id', $user->id)->get();

        $region = Region::get();

        $sum = $attribute->price_sum($cart);

        $data = array(
            'cart' => $cart,
            'attribute' => $attribute,
            'region' => $region,
            'sum' => $sum,
        );

        return view('checkout.index')->with($data);
    }

    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $orders = Orders::where('users_id', $user->id)->findOrFail($id);

        $product_id = json_decode($orders->product_array);
        $quantities = json_decode($orders->quantity_array);
        
        $old_price = 0;
        $new_price = 0;
        $remaining_products = [];

        foreach ($product_id as $key => $value) {
            $product = Products::where('quantity', '>', 0)->where('publish',1)->find($value);

            //თუ პროდუქტი არ არის ამ პროდუქტის გარდა ყველა დავამატოთ
                if(!$product){
                    //თანხის გამოთვლა
                        $missing_product_price = Products::where('id', $value)->value('price');
                        $amount_to_subtract = $quantities[$key] * $missing_product_price;
                        $orders->total -= $amount_to_subtract;

                    unset($product_id[$key]);
                    unset($quantities[$key]);
                    continue;
                }

            //როდესაც შეკვეთაში რაოდენობა აღემატება მარაგში არსებულ რაოდენობას
                if ($quantities[$key] > $product->quantity) {

                    //ძველი ფასის დადგენა თუ რაოდენობა შეიცვალა
                        $old_price += $quantities[$key] * $product->price;

                    //ახალი ფასის დადგენა თუ რაოდენობა შეიცვალა
                        $quantities[$key] = "$product->quantity";

                    $new_price += $product->quantity * $product->price;  
                }

            //დამატებისას პროდუქციის რაოდენობის კლება
                if($product->quantity >= $quantities[$key]){
                    $product->quantity -= $quantities[$key];
                    $product->save();
                }

            $remaining_products[] = $product;
        }

        //თუ თავიდან შეკვეთა ცარელაა
            if (empty($remaining_products)) {
                return redirect()->back()->with('error', trans('title.All products in the order are no longer available'));
            }

        //საბოლოო ფასის დადგენა 
            $fina_price = $old_price - $new_price;
            $orders->total -= $fina_price;

        $orderItem = new Orders();

        $orderItem->users_id = $orders->users_id;
        $orderItem->name = $orders->name;
        $orderItem->surname =  $orders->surname ;
        $orderItem->email = $orders->email;
        $orderItem->phone = $orders->phone;
        $orderItem->country = $orders->country;
        $orderItem->city = $orders->city;
        $orderItem->address = $orders->address;
        $orderItem->order_details = $orders->order_details;
        $orderItem->total = $orders->total;
        $orderItem->product_array = json_encode(array_values($product_id));
        $orderItem->quantity_array = json_encode(array_values($quantities));

        if($orderItem->save()){
            Mail::to($orders->email)->send(new OrderShipped($orderItem));

            return redirect("profile/$orderItem->id")->with('success',trans('title.Added successfully'));
        }
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:80'],
            'phone' => ['required', 'max:13'],
            'country' => ['required'],
            'city' => ['required'],
            'address' => ['required', 'string'],
        ]);

        $user = auth()->user();
        $cart = Cart::where('users_id', $user->id)->get();

        if(!$cart->count() > 0){
            return redirect()->back()->with('error',trans('title.cart is empty'));
        }
        else{
            $product_id = Cart::where('users_id', $user->id)->pluck('products_id')->toArray();
            $quantities = Cart::where('users_id', $user->id)->pluck('quantity')->toArray();


            $product_items = [];

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            foreach ($product_id as $key => $value) {
                $product = Products::where('quantity', '>', 0)->where('publish',1)->find($value);
                $total = $product->price;
                $two = "00";
                $unit_amaunt = "$total$two";
                
                $product_items[] = [
                    'price_data' => [
                        'currency' => 'GEL',

                        'product_data' => [
                            'name' => $product->title_en,
                        ],
                        'unit_amount' => $unit_amaunt,
                    ],
                    'quantity' => $quantities[$key]
                ];
            }

            $session = \Stripe\Checkout\Session::create([
                'line_items'            => [$product_items],
                'mode'                  => 'payment',
                'allow_promotion_codes' => true,
                'metadata'              => [
                    'user_id' => "0001"
                ],
                'customer_email'        => $request->input('email'),
                'success_url'           => route('success'),
                'cancel_url'            => route('cancel'),
            ]);
            
            // request გადაცემა success ფუნქციას
            Session::put('request_data', $request->all());

            return redirect()->away($session->url);

        }
        
    }

    public function success(){

        $user = auth()->user();

        //ყველა request-ის მიღება რომელიც შენახულია სესიაში
            $requestData = Session::get('request_data');

        $product_id = Cart::where('users_id', $user->id)->pluck('products_id')->toArray();
        $quantities = Cart::where('users_id', $user->id)->pluck('quantity')->toArray();

        $cart = Cart::where('users_id', $user->id)->get();

        //ატრიბუტი
            $attribute = new Attribute();

        //პროდუქციის საერთო ღირებულება მიტანის ხარჯის ჩათვლით
            $sum = $attribute->price_sum($cart) + 49;
        

        $orders = new Orders();

        $orders->users_id = $user->id;
        $orders->name = $requestData['name'];
        $orders->surname = $requestData['surname'];
        $orders->email = $requestData['email'];
        $orders->phone = $requestData['phone'];
        $orders->country = $requestData['country'];
        $orders->city = $requestData['city'];
        $orders->address = $requestData['address'];
        $orders->order_details = strip_tags($requestData['order_details']);
        $orders->total = $sum;
        $orders->product_array = json_encode($product_id);
        $orders->quantity_array = json_encode($quantities);

        if($orders->save()){

            Mail::to($requestData['email'])->send(new OrderShipped($orders));

            Cart::where('users_id', $user->id)->delete();

            foreach ($product_id as $key => $value) {
                $product = Products::where('quantity', '>', 0)->where('publish',1)->find($value);
                //დამატებისას პროდუქციის რაოდენობის კლება
                    if($product->quantity >= $quantities[$key]){
                        $product->quantity -= $quantities[$key];
                        $product->save();
                    }
            }

            return view('inc.success');
        }
    }

    public function cancel(){

        return view('inc.fail');
    }

    public function destroy($id)
    {
        
    }
}
