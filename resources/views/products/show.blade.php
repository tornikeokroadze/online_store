@extends('layouts.app') 


@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')

@section('content')
	<section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="product-summary">
                        <h3 class="product-title text-center">{{($product->{$attribute->tt('title')})}}</h3>
                        <div class="text-block mtb--30">
                            <p>{!! ($product->{$attribute->tt('text')}) !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-image">
                        <div class="product-gallery">
                            <div class="product-gallery__thumb">
                                <div class="product-gallery__thumb--image">
                                    <div class="atomic-element-carousel nav-slider" 
                                    data-slick-options='{
                                        "slidesToShow": 3,
                                        "slidesToScroll": 1,
                                        "vertical": false,
                                        "swipe": true,
                                        "verticalSwiping": false,
                                        "infinite": true,
                                        "focusOnSelect": true,
                                        "asNavFor": ".main-slider",
                                        "arrows": true, 
                                        "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "dl-icon-left" },
                                        "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "dl-icon-right" }
                                    }'
                                    data-slick-responsive='[
                                        {
                                            "breakpoint":992, 
                                            "settings": {
                                                "slidesToShow": 4,
                                                "vertical": false,
                                                "verticalSwiping": false
                                            } 
                                        },
                                        {
                                            "breakpoint":575, 
                                            "settings": {
                                                "slidesToShow": 3,
                                                "vertical": false,
                                                "verticalSwiping": false
                                            } 
                                        },
                                        {
                                            "breakpoint":480, 
                                            "settings": {
                                                "slidesToShow": 2,
                                                "vertical": false,
                                                "verticalSwiping": false
                                            } 
                                        }
                                    ]'>
                                        <figure class="product-gallery__thumb--single">
                                            <img src="{{asset('img/products/'.$product->image)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                        </figure>
                                        <figure class="product-gallery__thumb--single">
                                            <img src="{{asset('img/products/'.$product->image2)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                        </figure>

                                        @foreach($gallery as $item)
                                            <figure class="product-gallery__thumb--single">
                                                <img src="{{asset('img/products/thum/'.$item->image)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                            </figure>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="product-gallery__large-image">
                                <div class="gallery-with-thumbs">
                                    <div class="product-gallery__wrapper">
                                        <div class="atomic-element-carousel main-slider gallery-container"
                                        data-slick-options='{
                                            "slidesToShow": 1,
                                            "slidesToScroll": 1,
                                            "infinite": true,
                                            "arrows": false, 
                                            "asNavFor": ".nav-slider"
                                        }'>
                                            <figure class="product-gallery__image">
                                                <a href="{{asset('img/products/'.$product->image)}}" class="gallery-item">
                                                    <img src="{{asset('img/products/'.$product->image)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                                </a>
                                            </figure>
                                            <figure class="product-gallery__image">
                                                <a href="{{asset('img/products/'.$product->image2)}}" class="gallery-item">
                                                    <img src="{{asset('img/products/'.$product->image2)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                                </a>
                                            </figure>

                                            @foreach($gallery as $item)
                                                <figure class="product-gallery__image">
                                                    <a href="{{asset('img/products/thum/'.$item->image)}}" class="gallery-item">
                                                        <img src="{{asset('img/products/thum/'.$item->image)}}" alt="{{($product->{$attribute->tt('title')})}}">
                                                    </a>
                                                </figure>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-summary">
                        <div class="accordion" id="accordionExample">
                          @if(($product->{$attribute->tt('notes')}))
                          	<div class="card notes-collapse">
	                            <div class="card-head" id="headingTwo">
	                              	<h2 class="mb-0" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">@lang('title.MAIN NOTES')</h2>
	                            </div>
	                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
	                              	<div class="card-body">
	                                	<p class="subheading-tag">{!! ($product->{$attribute->tt('notes')}) !!}</p>
	                             	</div>
	                            </div>
                          	</div>
                          @endif
                        </div>
                        <span class="product-price-wrapper product-price-wrapper-details">
                            <span class="money"><span class="lari">b</span>
                                <span id="currency">{{ $product->price }}</span>
                            </span>
                            <span class="product-price-old">
                                <span class="money"><span class="lari">b</span>
                                    <span id="currency">{{ $product->old_price }}</span>
                                </span>
                            </span>
                        </span>
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-style-1 w-100">@lang('title.Add To Cart')</a>
                            <a href="{{ route('login') }}" class="btn btn-style-3"><i class="dl-icon-heart3"></i>@lang('title.Add to Wishlist')</a>
                        @else
                            <div class="pd-selects">
                                <button type="button" onclick="cart({{$product->id}})" class="btn btn-style-1 w-100">@lang('title.Add To Cart')</button>

                                <button type="button" onclick="wishlist({{$product->id}})" class="btn btn-style-3">
                                    @if(count($wishlist->where('products_id', $product->id)) > 0)
                                        <i id="heartIcon_{{$product->id}}" style="color: red" class="dl-icon-heart3"></i>
                                    @else
                                        <i id="heartIcon_{{$product->id}}" class="dl-icon-heart3"></i>
                                    @endif
                                    @lang('title.Add to Wishlist')
                                </button>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="main-product-section section-paddings-3 border-top wow fadeInUp" data-wow-duration="2000ms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h4>@lang('title.You may also like')</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="atomic-element-carousel product-carousel nav-vertical-center"
                            data-slick-options='{
                            "spaceBetween": 30,
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "arrows": true
                            }' data-slick-responsive='[
                                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                                {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                {"breakpoint":450, "settings": {"slidesToShow": 1} }
                            ]'>
                        @foreach($products->where('old_price', '!=', 0) as $item)
	                        <div class="atomic-product">
		                        <div class="product-inner">
		                            <figure class="product-image">
		                                <div class="product-image--holder">
		                                    <a href="{{asset('products/'.$item->id) }}">
		                                        <img src="{{asset('img/products/'.$item->image)}}" alt="{{($item->{$attribute->tt('title')})}}" class="primary-image">
		                                        <img src="{{asset('img/products/'.$item->image2)}}" alt="{{($item->{$attribute->tt('title')})}}" class="secondary-image">
		                                    </a>
		                                </div>
		                                <div class="atomic-product-action">
		                                    <div class="product-action">
                                                @guest
                                                    <a href="{{ route('login') }}" class="action-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist">
                                                        <i class="dl-icon-heart3"></i>
                                                    </a>
                                                @else
                                                    <button type="button" onclick="wishlist({{$item->id}})" class="btn btn-style-3"><i class="dl-icon-heart3"></i>@lang('title.Add to Wishlist')</button>
                                                @endguest
		                                    </div>
		                                </div>
		                            </figure>
		                            <div class="product-info-content">
		                                <div class="product-info text-center">
		                                    <h3 class="product-title">
		                                        <a href="{{asset('products/'.$item->id) }}">{{($item->{$attribute->tt('title')})}}</a>
		                                    </h3>
		                                    <span class="product-price-wrapper">
		                                    	@if($item->price)
		                                        	<span class="money"><span class="lari">b</span>
                                                        <span id="currency">{{ $item->price }}</span>
                                                    </span>
		                                        @endif
		                                        @if($item->old_price)
			                                        <span class="product-price-old">
			                                            <span class="money"><span class="lari">b</span>
                                                            <span id="currency">{{ $item->old_price }}</span>
                                                        </span>
			                                        </span>
			                                       @endif
		                                    </span>
		                                </div>
		                                <div class="product-info product-info-secondary text-center">
		                                    <h3 class="product-title">
		                                        <a href="{{asset('products/'.$item->id) }}">{{($item->{$attribute->tt('title')})}}</a>
		                                    </h3>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-50">
                    <a href="{{ asset('products') }}" class="heading-button">@lang('title.View All')</a>
                </div>
            </div>
        </div>
    </section>

    @include('inc.services')
    
@endsection