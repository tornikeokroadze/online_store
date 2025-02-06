<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App;

class TextController extends Controller
{
    public function show($id)
    {
        //ატრიბუტი
            $attribute = new Attribute();

        //შემოსული ენა
            $lang = App::getLocale();

        $text=Text::findOrFail($id);

        $data = array(
            'attribute' => $attribute,
            'text' => $text,
        );

        return view('text.show')->with($data);
    }
}
