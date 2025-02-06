<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Products;
use App\Models\Slider;
use App;

class MainPageController extends Controller
{
    
    public function index()
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //სლაიდი 
            $slider = Slider::where('publish', 1)->orderBy('sort','ASC')->take(4)->get();

        //შემოსული ენა
            $lang = App::getLocale();

        $product = Products::where('publish',1)->where('quantity', '>', 0)->orderBy('sort','ASC')->take(8)->get();

        $product_second = Products::where('publish',1)->where('quantity', '>', 0)->where('category_id', '!=', 1)->orderBy('sort','ASC')->take(3)->get();

        $data = array(
            'attribute' => $attribute,
            'slider' => $slider,
            'product' => $product,
            'product_second' => $product_second,
        );

        return view('page.index')->with($data);
    }

    public function show($id)
    {
        
    }
    public function search(Request $request){
               
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();


        //სერჩი
            $q = $request->q;
            if(is_null($q)) return redirect('/');
            
            $products = Products::whereNotNull('title_'.$lang)->whereNotNull('text_'.$lang)->where('publish',1)->where(function($query) use ($q,$lang) {                                         
                                    if(isset($q)){
                                                    $query->where(function($queryTitle) use ($q,$lang){
                                                    $queryTitle->where('title_'.$lang,'LIKE','%'.$q.'%')
                                                       ->orWhere('text_'.$lang,'LIKE','%'.$q.'%');
                                                });  
                                    }
                                    
                                    
                                })->orderBy('sort','ASC')->paginate(16);



        
        $data = array(
            'attribute' => $attribute,
            'q' => $q,
            'products' => $products,
        );

        return view('page.search')->with($data);
    }
}
