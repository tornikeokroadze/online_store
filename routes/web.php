<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GoogleAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], 
    function(){ 

    Route::get('/', [MainPageController::class, 'index']);
    
    Route::post('/message', [ContactController::class, 'message'])->name('message.send');
    Route::get('/search', [MainPageController::class, 'search']);

    Route::resource('/faq', FaqController::class);

    Route::resource('/text', TextController::class);

    //კონტაქტი
        Route::get('/contact', [ContactController::class, 'index']); 

    Route::resource('/products', ProductsController::class);    

    
    Auth::routes();


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('/profile/{id}', [ProfileController::class, 'show']);

    Route::resource('/wishlist', WishlistController::class);
    Route::post('/wishlist', [WishlistController::class, 'clear'])->name('clear.wishlist');
    Route::get('/wishlist-save', [WishlistController::class, 'store'])->name('wishlist.save');
    Route::get('/wishlist-count', [WishlistController::class, 'wishlistCount'])->name('wishlist-count');
    

    Route::resource('/checkout', CheckoutController::class);
    Route::get('/success', [CheckoutController::class, 'success'])->name('success');
    Route::get('/cancel', [CheckoutController::class, 'cancel'])->name('cancel');
    
    Route::resource('/cart', CartController::class);
    Route::post('/cart', [CartController::class, 'clear'])->name('clear.cart');
    Route::get('/cart-save', [CartController::class, 'store'])->name('cart.save');
    Route::get('/cart-count', [CartController::class, 'cartCount'])->name('cart-count');
    Route::patch('qty_update_cart', [CartController::class, 'qtyCartCount'])->name('qty_update_cart');

    Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
    Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
});

