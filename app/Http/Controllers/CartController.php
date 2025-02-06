<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Products;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App;

class CartController extends Controller
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
    
    public function index()
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        $user = auth()->user();

        $cart = Cart::where('users_id', $user->id)->get();

        $sum = $attribute->price_sum($cart);

        Session::put('cart_subtotal', $sum);

        $data = array(
            'cart' => $cart,
            'attribute' => $attribute,
            'sum' => $sum,
        );
        return view('cart.index')->with($data);
    }

    public function store(Request $request)
    {

        $id = (int)$request->product_id;
        $user = auth()->user();
        
        if($request->status !== null){
            $cart = Cart::where('users_id', $user->id)->find($id);
            $cart->delete();

            return $this->cartItem();

            return array('success',trans('title.Deleted successfully'));
        }

        else{
            //damatebistvis
                $product = Products::where('publish', 1)->findOrFail($id);

            $cartItem = Cart::where('users_id', $user->id)
                            ->where('products_id', $product->id)
                            ->first();


            if ($cartItem) {
                //თუ პროდუქციის რაოდენობა გაუტოლდა კალათაში პროდუქციის რაოდენობას
                    if($cartItem->quantity >= $product->quantity){
                        return array('error',trans('title.The number of products is limited')) ;
                    }
                else{
                    $cartItem->quantity += 1;
                    $cartItem->save();
                }
            }
            else {
                $cartItem = new Cart();
                $cartItem->users_id = $user->id;
                $cartItem->products_id = $product->id;
                $cartItem->quantity = 1;
                $cartItem->save();
            }

            //შევამოწმოთ არის თუ არა პროდუქტი სურვილების სიაში, თუ არის წავშალოთ 
                $wishlistItem = Wishlist::where('users_id', $user->id)
                            ->where('products_id', $product->id)
                            ->first();

                if ($wishlistItem) {
                    $wishlistItem->delete();
                }

            //
                return $this->cartItem();
        }
            
    }

    public function cartItem(){
        
        //ატრიბუტი
            $attribute = new Attribute();

        $user = auth()->user();

        //კალათა
            $cart = Cart::where('users_id', $user->id)->get();

        //პროდუქციის ფასის დათვლა
            $sum_cart = $attribute->price_sum($cart);

        $data = array(
            'attribute' => $attribute,
            'cart' => $cart,
            'sum_cart' => $sum_cart,
        );

        return view('products.carts')->with($data);

    }


    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        $user = auth()->user();
        
        $cart = Cart::where('users_id', $user->id)->findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success',trans('title.Deleted successfully'));
    }

    public function clear()
    {
        $user = auth()->user();

        $cart = Cart::where('users_id', $user->id)->delete();
        return redirect('/cart')->with('success',trans('title.Deleted successfully'));
    }


    public function cartCount()
    {
        $user = auth()->user();
        $count = Cart::where('users_id', $user->id)->count();
        return response()->json($count);
    }


    public function qtyCartCount(Request $request)
    {

        $user = auth()->user();

        if($request->id && $request->quantity){
            $cart = Cart::findOrFail($request->id);

            $product = Products::findOrFail($cart->products_id);

            //მოსული რაოდენობა რამდენის დამატება ან კლებაც ხდება
                $quantities = $request->quantity - $cart->quantity;


            if($product->quantity < $quantities){
                return array('error',trans('title.The number of products is limited'));
            }
            else {
                $cart->quantity = $request->quantity;
                $product->quantity -= $quantities;
                $cart->save();
                $product->save();

                $price = $product->price * $cart->quantity;

                $carts = Cart::where('users_id', $user->id)->get();
                $subtotal = 0;
                foreach ($carts as $item) {
                    $subtotal += $item->products->price * $item->quantity;
                }

                $total = $subtotal + 49;  //49-მიტანის საფასური

                return array(
                    'success',
                    trans('title.Updated successfully'),
                    'price' => $price,
                    'subtotal' => $subtotal,
                    'total' => $total
                );
            }
        }
    }

}
