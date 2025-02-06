<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        $products = Products::where('publish',1)->where('quantity', '>', 0)->orderBy('sort','ASC')->paginate(16);


            $data = array(
                'attribute' => $attribute,
                'products' => $products,
            );

            return view('products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        
        $product = Products::where('publish',1)->where('quantity', '>', 0)->findOrFail($id);
        
        $products = Products::where('publish',1)->where('id','!=',$id)->where('quantity', '>', 0)->orderBy('sort','ASC')->take(8)->get();

        $gallery = Gallery::where('products_id', $product->id)->get();
        
        $data = array(
            'attribute' => $attribute,
            'product' => $product,
            'products' => $products,
            'gallery' => $gallery,
        );

        return view('products.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($id){

            $products = Products::findOrFail($id);
            $products->delete();
            return response()->json("deleted successfully", 200);
        }
        else {
            return response()->json("error cant delete", 404); 
        }

    }
}
