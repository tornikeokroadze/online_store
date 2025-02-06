<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Text;
use App\Models\Attribute;
use App\Models\Currency;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Services;
use App\Models\Wishlist;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        view()->composer('*', function ($view) {
            //ატრიბუტი
                $attribute = new Attribute();

            if (auth()->check()) {
                $user = auth()->user();

                //კალათა
                    $cart = Cart::where('users_id', $user->id)->get();

                //სურვილების სია
                    $wishlist = Wishlist::where('users_id', $user->id)->get();

                //პროდუქციის ფასის დათვლა
                    $sum_cart = $attribute->price_sum($cart);

                $array = array(
                    'cart' => $cart,
                    'wishlist' => $wishlist,
                    'sum_cart' => $sum_cart,
                );
                $view->with($array);
            } 

            //სერვისები
                $services = Services::where('publish',1)->orderBy('sort','ASC')->get();

            $contact = Contact::get()->first();

            $currency = new Currency(); 
            
            
            $data = array(
                'attribute' => $attribute,
                'contact' => $contact,
                'services' => $services,
                'currency' => $currency,
            );

            $view->with($data);
        } );

        //მენიუ
        view()->composer('inc.menu', function ($view) {
            
            //ატრიბუტი
                $attribute = new Attribute();

            //საკონტაქტო ინფორმაცია
                $contact = Contact::get()->first();

            $category = Category::orderBy('sort','ASC')->get();


            
            $data = array(
                'attribute' => $attribute,
                'contact' => $contact,
                'category' => $category,
                
            );

            $view->with($data);
        } );


        //ფუტერი
        view()->composer('inc.footer', function ($view) {

            $footer_pages = Text::where('publish',1)->orderBy('sort','ASC')->get(); 

            //ატრიბუტი
                $attribute = new Attribute();

            //საკონტაქტო ინფორმაცია
                $contact = Contact::get()->first();


            $data = array(
                'footer_pages' => $footer_pages,
                'attribute' => $attribute,
                'contact' => $contact,
            );

            $view->with($data);
        } );
    }
}
