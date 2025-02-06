@extends('layouts.app') 


@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')


@section('content')
	<section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms" id="cart-page">
        <div class="container-fluid">
            <div class="sec-title">
                <h4><span id="cart-count-products">0</span> @lang('title.products')</h4>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-start">@lang('title.Product')</th>
                                            <th>&nbsp;</th>
                                            <th>@lang('title.Price')</th>
                                            <th>@lang('title.Quantity')</th>
                                            <th>@lang('title.Total')</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($cart as $item)
                                            <tr id="remove-item-{{$item->id}}" data-id="{{$item->id}}">
                                                <td class="product-thumbnail text-start">
                                                    <a href="{{ asset('products/'.$item->products_id) }}">
                                                        <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->category->{$attribute->tt('title')})}}">
                                                    </a>
                                                </td>
                                                <td class="product-name text-start wide-column">
                                                    <h3><a href="{{ asset('products/'.$item->products_id) }}">{{($item->products->{$attribute->tt('title')})}}</a></h3>
                                                    <a href="{{ asset('products/'.$item->products_id) }}" class="pl-category">{{($item->products->category->{$attribute->tt('title')})}}</a>
                                                    <p>{{ $item->products->size }}</p>
                                                </td>
                                                <td class="product-price">
                                                    <span class="product-price-wrapper">
                                                        <span class="money"><span class="lari">b</span>
                                                            <span id="currency">{{$item->products->price }}</span>
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                		<input type="number" class="quantity-input update_quantity" name="quantity" id="qty-1" value="{{ $item->quantity }}" min="1" max="{{$item->products->quantity}}">
                                                    </div>
                                                </td>
                                                <td class="product-total-price">
                                                    <span class="product-price-wrapper">
                                                        <span class="money"><span class="lari">b</span>
                                                            <span class="price-count" id="currency" >{{$item->products->price * $item->quantity }}</span>
                                                        </span>
                                                    </span>
                                                </td>
                                                <td class="product-remove text-start">
                                                	<button style="border: none; background: none;" onclick="cart({{$item->id}},'trash')" type="button"><i class="dl-icon-close"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-end mt-30">
                        	<form action="{!! route('clear.cart') !!}" method="POST">
                        	@csrf
                            	<button type="submit" class="btn btn-style-1">@lang('title.Clear Cart')</button>
                            </form>
                        </div>
                    </div>
                </div>
                @if(count($cart) > 0)
                    <div class="offset-lg-1 col-lg-4">
                        <div class="cart-collaterals">
                            <div class="cart-totals">
                                <div class="table-content table-responsive">
                                    <table class="table order-table">
                                        <tbody>
                                            <tr>
                                                <th>@lang('title.Subtotal')</th>
                                                <td><span class="lari">b</span><span class="cart_subtotal" id="currency">{{$sum}}</span></td>
                                            </tr>
                                            <tr>
                                                <th>@lang('title.Shipping')</th>
                                                <td>
                                                    <span><span class="lari">b</span>
                                                        <span id="currency">49.00</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>@lang('title.Total')</th>
                                                <td>
                                                    <span class="product-price-wrapper">
                                                        <span class="money"><span class="lari">b</span>
                                                        <span class="cart_total" id="currency">{{ $sum + 49 }}</span>
                                                    </span>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ asset('checkout') }}" class="btn btn-fullwidth btn-style-1 mt-30">@lang('title.Proceed To Checkout')
                                </a>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
