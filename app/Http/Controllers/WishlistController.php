<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Products;
use App;

class WishlistController extends Controller
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
        $wishlist = Wishlist::where('users_id', $user->id)->get();

        $data = array(
            'wishlist' => $wishlist,
            'attribute' => $attribute,
        );
        return view('wishlist.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = (int)$request->product_id;
        $user = auth()->user();

            if($request->status){
                $wishlist = Wishlist::where('users_id', $user->id)->find($id);
                $wishlist->delete();

                return $this->wishlistItem();

                return array('success',trans('title.Deleted successfully'));
            }

        $product = Products::where('publish', 1)->findOrFail($id);

        $productItem = Wishlist::where('users_id', $user->id)
                        ->where('products_id', $product->id)
                        ->first();


        //შევამოწმოთ არის თუ არა პროდუქტი კალათაში თუ არის არ დავამატოთ სურვილების სიაში
            $cartItem = Cart::where('users_id', $user->id)
                        ->where('products_id', $product->id)
                        ->first();

        if ($cartItem) {
            return array('error', trans('title.This product has already been added to the cart'));
        }
            
        else {
            $countWishlist = Wishlist::where('users_id', $user->id)->where('products_id', $id)->count();

            $productItem = new Wishlist();

            if($countWishlist == 0){
                $productItem->users_id = $user->id;
                $productItem->products_id = $product->id;
                $productItem->save();
            }
            else{
                Wishlist::where('users_id', $user->id)->where('products_id', $id)->delete();
            }
        }


        return $this->wishlistItem();
    }


    public function wishlistItem(){
        
        //ატრიბუტი
            $attribute = new Attribute();

        $user = auth()->user();

        //კალათა
            $wishlist = Wishlist::where('users_id', $user->id)->get();

        $data = array(
            'attribute' => $attribute,
            'wishlist' => $wishlist,
        );

        return view('products.wishlist')->with($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = auth()->user();
        $product = Products::findOrFail($id);

        // სურვილების სიში დამატებული პროდუქტი მიმდინარე მომხმარებლისთვის
            $wishlistItem = Wishlist::where('users_id', $user->id)
                                ->where('products_id', $product->id)
                                ->first();

        if ($wishlistItem) {
            // წავშალოთ პროდუქტი სურვილების სიიდან
                $wishlistItem->delete();

            // შევამოწმოთ პროდუქტი არის თუ არა კალათაში
                $cartItem = Cart::where('users_id', $user->id)
                                ->where('products_id', $product->id)
                                ->first();

            if ($cartItem) {
                // თუ პროდუქტი არის კალათაში რაოდენობა გავზარდოთ ერთით
                    $cartItem->quantity += 1;
                    $cartItem->save();
            } 
            else {
                // თუ პროდუქტი არ არის კალათაში შევქმნათ ახალი
                    $cartItem = new Cart();
                    $cartItem->users_id = $user->id;
                    $cartItem->products_id = $product->id;
                    $cartItem->quantity = 1;
                    $cartItem->save();
            }

            return redirect('/wishlist')->with('success', trans('title.Added to cart successfully'));
        }
        else {
            //თუ პროდუქტი პოვნა ვერ მოხერხდა
                return redirect('/wishlist')->with('error', trans('title.Product not found in wishlist'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $wishlist = Wishlist::where('users_id', $user->id)->findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('success', trans('title.Deleted successfully'));
    }

    public function clear()
    {
        $user = auth()->user();
        $wishlist = Wishlist::where('users_id', $user->id)->delete();
        return redirect('/wishlist')->with('success', trans('title.Deleted successfully'));
    }

    public function wishlistCount()
    {
        $user = auth()->user();
        $count = Wishlist::where('users_id', $user->id)->count();
        return response()->json($count);
    }

}
