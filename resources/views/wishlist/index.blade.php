@extends('layouts.app')



@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')

@section('content') 

	<section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms" id="wishlist-page">
        <div class="container">
            <div class="sec-title">
                <h4> <span id="wishlist-count-products">0</span> @lang('title.products')</h4>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-form" action="#">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="table-content table-responsive">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-start">@lang('title.Product')</th>
                                                <th>&nbsp;</th>
                                                <th>@lang('title.Price')</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($wishlist as $item)
	                                            <tr id="remove-wishlist-item-{{$item->id}}">
	                                                <td class="product-thumbnail text-start">
	                                                	<a href="{{ asset('products/'.$item->products_id) }}">
	                                                    <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->category->{$attribute->tt('title')})}}"></a>
	                                                </td>
	                                                <td class="product-name text-start wide-column">
	                                                    <h3><a href="{{ asset('products/'.$item->products_id) }}">{{($item->products->{$attribute->tt('title')})}}</a></h3>
	                                                    <a href="{{ asset('products/'.$item->products_id) }}" class="pl-category">{{($item->products->category->{$attribute->tt('title')})}}</a>
	                                                    <p>{{ $item->products->size }}</p>
	                                                </td>
	                                                <td class="product-price"> 
	                                                    <span class="money"><span class="lari">b</span>
	                                                        <span id="currency">{{$item->products->price }}</span>
	                                                    </span>
	                                                </td>
	                                                <td>
	                                                	<button type="button" onclick="cart({{$item->products->id}})" class="btn btn-style-1">@lang('title.Add To Cart')</button>
	                                                </td>

	                                                <td class="product-remove text-start">
	                                                	<button style="border: none; background: none;" onclick="wishlist({{$item->id}},'trash')" type="button"><i class="dl-icon-close"></i></button>
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
                            	<form action="{!! route('clear.wishlist') !!}" method="POST">
	                            @csrf
                                	<button type="submit" class="btn btn-style-1">@lang('title.Clear Wishlist')</button>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection