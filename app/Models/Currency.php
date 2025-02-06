<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;

class Currency
{ 
    public function gel_usd(){
        
        $usd = 2.6432;

        $year = date('Y-m-d');

        $url = "https://nbg.gov.ge/gw/api/ct/monetarypolicy/currencies/ka/json/?date=$year";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_NOBODY, FALSE);

        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $head = curl_exec($ch);
        if($head){
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            $head = json_decode($head, true);

            $usd = ($head[0]['currencies'][40]['rate']);
        }

        curl_close($ch);

        // return number_format($price / $usd);
        return $usd;
    }
}