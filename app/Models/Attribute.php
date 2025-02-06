<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use App;

class Attribute
{
    public function tt($str){

        $locale=App::getLocale();
        $column=$str.'_'.$locale;

        return $column;
    }


    public function price_sum($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item->products->price * $item->quantity;
        }
        return $subtotal;
    }


    public function product_arr($array){
        if (empty($array)) {
            return [];
        }
        $orderByJson = 'FIELD(id, ' . implode(',', json_decode($array)) . ')';

        $products = Products::whereIn('id', json_decode($array))
            ->orderByRaw($orderByJson)
            ->get();
        return $products;
    }

    public function jsonDecode($array){
        $dejode = json_decode($array);
        return $dejode;
    }


}
