@extends('layouts.app')

@section('content')
	<section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h4>@lang('title.Order') #{{$order->id}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center pt--30">
                        <div class="col-xl-12">
                            <div class="table-content table-responsive orders-table">
                              <table class="table text-center">
                                  <thead>
                                      <tr class="cart-product">
                                           <th class="order-product">@lang('title.Order ID')</th>
                                           <th class="order-product">@lang('title.Date')</th>
                                           <th class="order-product">@lang('title.Total Amount')</th>
                                           <th class="order-product">@lang('title.Order Status')</th>
                                           <th class="order-product">@lang('title.Payment Status')</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="cart-product">
                                           <td>#{{$order->id}}</td>
                                           <td>{{$order->created_at}}</td>
                                           <td><span class="lari">b</span><span id="currency">{{$order->total}}</span></td>
                                           <td><span class="{{ $order->order_status === 'fnished' ? 'order-green' : ($order->order_status === 'cancelled' ? 'order-red' : 'order-orange') }}">{{$order->order_status}}</span></td>
                                           <td><span class="{{ $order->payment_status === 'not payed' ? 'order-red' : 'order-green' }}">{{$order->payment_status}}</span></td>
                                      </tr>
                                    </tbody>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt--100">
                <div class="col-lg-7 mb-md--30">
                    <form class="cart-form" action="#">
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($attribute->product_arr($order->product_array) as $key => $value)
	                                            <tr>
	                                                <td class="product-thumbnail text-start">
	                                                    <img src="{{ asset('img/products/'.$value->image) }}" alt="{{($value->{$attribute->tt('title')})}}">
	                                                </td>
	                                                <td class="product-name text-start wide-column">
	                                                    <h3><a href="{{ asset('products/'.$value->id) }}">{{($value->{$attribute->tt('title')})}}</a></h3>
	                                                    <a href="{{ asset('products/'.$value->id) }}" class="pl-category">{{($value->category->{$attribute->tt('title')})}}</a>
	                                                </td>
	                                                <td class="product-price">
	                                                    <span class="product-price-wrapper">
	                                                        <span class="money"><span class="lari">b</span>
                                                                <span id="currency">{{ $value->price }}</span>
                                                            </span>
	                                                    </span>
	                                                </td>
	                                                <td class="product-quantity">x {{$quantities[$key]}}</td>
	                                                <td class="product-total-price">
	                                                    <span class="product-price-wrapper">
	                                                        <span class="money"><span class="lari">b</span>
                                                                <span id="currency">{{ $value->price * $quantities[$key] }}
                                                                </span>
                                                            </span>
	                                                    </span>
	                                                </td>
	                                            </tr>
	                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="order-details">
                        <h2 class="heading-secondary mb--20">@lang('title.Order Details')</h2>
                        <div class="table-content table-responsive">
                            <table class="table order-table order-table-2">
                                <tbody>
                                    <tr>
                                        <div class="order-det">
                                            <ul>
                                                <li><span>@lang('title.First Name'), @lang('title.Last Name'):</span> {{ $order->name }} {{ $order->surname }}</li>
                                                <li><span>@lang('title.Email'):</span> {{ $order->email }}</li>
                                                <li><span>@lang('title.phone'):</span> {{ $order->phone }}</li>
                                                <li><span>@lang('title.Country'):</span> {{ $order->country }}</li>
                                                <li><span>@lang('title.City'):</span> {{ $order->city }}</li>
                                                <li><span>@lang('title.Address'):</span> {{ $order->address }}</li>
                                                @if($order->order_details)
                                                	<li><span>@lang('title.Order Details'):</span> {{ $order->order_details }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                            <form action="{!!  route('checkout.update',['checkout' => $order->id])  !!}" method="POST">
                            @csrf
                                <button type="submit" class="btn btn-fullwidth btn-style-1 mt--10">@lang('title.Order Again')</button>
                                @method('PUT')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection