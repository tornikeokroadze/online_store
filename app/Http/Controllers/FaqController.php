<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App;

class FaqController extends Controller
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

        //ხშირად დასმული კითხვები
            $faq = Faq::where('publish',1)->orderBy('sort','ASC')->get();

            $data = array(
                'faq' => $faq,
                'attribute' => $attribute,
            );

            return view('faq.index')->with($data);
    }

}
