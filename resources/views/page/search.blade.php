@extends('layouts.app') 

@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')

@section('content')
	<section class="main-product-section section-paddings-4 product-list">
        <div class="container-fluid">
            <div class="row">
            	@foreach($products as $item)
	                <div class="col-lg-3 wow fadeInUp" data-wow-duration="2000ms">
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
	                </div>
	            @endforeach 
	            @if(count($products)>0)
	                <div class="pagination justify-content-center custom-pagination">
					    {{ $products->appends(request()->input())->links("pagination::bootstrap-4") }}
					</div>
	            @endif 
            </div>
        </div>
    </section>
@endsection