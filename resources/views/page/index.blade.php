@extends('layouts.app')


@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',($contact->{$attribute->tt('seo_description')}))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',($contact->{$attribute->tt('seo_keywords')}))
@section('linkage','https://www.parfume.ge')
@section('url','https://www.parfume.ge')

@section('content')
	@if(count($slider)>0)
		<section class="slider-area wow fadeInUp" data-wow-duration="3000ms">
	        <div class="atomic-element-carousel nav-style-1 nav-center-bottom slider-fade"                
	        data-slick-options='{
	            "dots": true,
	            "slidesToShow" : 1,
	            "infinite": true,
	            "fade": true,
	            "speed": 500,
	            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fal fa-angle-left" },
	            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fal fa-angle-right" }
	        }'
	        data-slick-responsive='[
	            {"breakpoint": 992, "settings": {"slidesToShow": 1}},
	            {"breakpoint": 576, "settings": {"slidesToShow": 1}}
	        ]'>
	        	@foreach($slider as $item)
		            <div class="item">
		                <div class="main-slide">
		                    <img src="{{ asset('img/slider/'.$item->image) }}">
		                    <div class="slider-content">
		                        <div class="container-fluid">
		                            <div class="row">
		                            	@if( isset($item->{$attribute->tt('btn')}) && isset($item->url) )
			                                <div class="col-12">
			                                    <a href="{{$item->url}}" class="btn btn-style-1">{{($item->{$attribute->tt('btn')})}}</a>
			                                </div>
			                            @endif
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        @endforeach
	        </div>
	    </section>
	@endif

	<section class="main-product-section section-paddings wow fadeInUp" data-wow-duration="3000ms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h4>@lang('title.Experience the natural essence of atomic parfums')</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="atomic-element-carousel product-carousel nav-vertical-center"
                            data-slick-options='{
                            "dots": true,
                            "spaceBetween": 30,
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "arrows": true
                            }' data-slick-responsive='[
                                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                                {"breakpoint":991, "settings": {"slidesToShow": 2} },
                                {"breakpoint":450, "settings": {"slidesToShow": 1} }
                            ]'>
                        @foreach($product->where('old_price', '!=', 'NULL') as $item)
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
			                                    	<button style="background: none; border: none;" type="button" class="action-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" onclick="wishlist({{$item->id}})">
			                                    		@if(count($wishlist->where('products_id', $item->id)) > 0)
			                                    			<i id="heartIcon_{{$item->id}}" style="color: red" class="dl-icon-heart3"></i>
			                                    		@else
			                                            	<i id="heartIcon_{{$item->id}}" class="dl-icon-heart3"></i>
			                                            @endif
			                                        </button>
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
        </div>
    </section>


    <section class="section-paddings-2 wow fadeInUp" data-wow-duration="3000ms">
        <div class="container-fluid">
            <div class="row">
            	@foreach($product_second as $item)
	                <div class="col-md-4">
	                    <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
	                        <div class="banner-inner">
	                        	<a href="{{asset('products/'.$item->id) }}">
		                            <div class="banner-image">
		                                <img src="{{asset('img/products/'.$item->image)}}" alt="{{($item->{$attribute->tt('title')})}}">
		                            </div>
		                        </a>
		                        <a href="{{asset('products/'.$item->id) }}">
		                            <div class="banner-info">
		                                <p class="banner-title-1">{{($item->category->{$attribute->tt('title')})}}</p>
		                                <h2 class="banner-title-2">{{($item->{$attribute->tt('title')})}}</h2>
		                            </div>
		                        </a>
	                        </div>
	                    </div>
	                </div>
	            @endforeach
            </div>
            <div class="row">
                <div class="col-12 text-center mt-50">
                    <a href="{{ asset('products') }}" class="heading-button">@lang('title.View All')</a>
                </div>
            </div>
        </div>
    </section>

    @if(count($services)>0)
    <section class="services-section section-paddings wow fadeInUp" data-wow-duration="3000ms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h4>@lang('title.Our Services')</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
            	@foreach($services as $item)
	                <div class="col-md-2">
	                    <div class="service-box">
	                        <img src="{{ asset('img/services/'.$item->image) }}">
	                        <h5>{{($item->{$attribute->tt('title')})}}</h5>
	                    </div>
	                </div>
	            @endforeach
            </div>
        </div>
    </section>
@endif
    
@endsection
