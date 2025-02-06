@extends('layouts.app')


@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')


@section('content')
    <form action="{!! route('checkout.store') !!}" method="POST">
        @csrf
    	<section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 pb--30">
                        <div class="sec-title">
                            <h4>@lang('title.Billing Details')</h4>
                        </div>
                        <div class="checkout-form">
                            <div class="form form--login row">
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.First Name') <span class="required">*</span></label>
                                    <input type="text" class="form__input form__input--3" name="name" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.Last Name') <span class="required">*</span></label>
                                    <input type="text" class="form__input form__input--3" name="surname" value="{{ Auth::user()->surname }}" required>
                                </div>
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.Email') <span class="required">*</span></label>
                                    <input type="email" class="form__input form__input--3" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.telephone number') <span class="required">*</span></label>
                                    <input type="number" class="form__input form__input--3" name="phone" value="{{ Auth::user()->phone }}" required>
                                </div>
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.Country') <span class="required">*</span></label>
                                    <select name="country" class="form__input form__input--2 nice-select" required>
                                        <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                                        @foreach($region as $item)
                                            <option value="{{($item->{$attribute->tt('country')})}}">{{($item->{$attribute->tt('country')})}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form__group mb--20 col-lg-6">
                                    <label class="form__label form__label--2">@lang('title.City') <span class="required">*</span></label>
                                    <select name="city" class="form__input form__input--2 nice-select">
                                        <option value="{{ Auth::user()->city }}" required>{{ Auth::user()->city }}</option>
                                        @foreach($region as $item)
                                            <option value="{{($item->{$attribute->tt('city')})}}">{{($item->{$attribute->tt('city')})}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form__group mb--20 col-lg-12">
                                    <label class="form__label form__label--2">@lang('title.Address') <span class="required">*</span></label>
                                    <input type="text" class="form__input form__input--3" name="address" value="{{ Auth::user()->address }}" required>
                                </div>
                                <div class="form__group mb--20 col-lg-12">
                                    <label class="form__label form__label--2">@lang('title.Order Details') <span class="required"></span></label>
                                    <textarea class="form__input form__input--textarea" name="order_details"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 mt-md--40">
                        <h2 class="heading-secondary mb--20">@lang('title.Your Order')</h2>
                        <div class="order-details">
                            <div class="table-content table-responsive">
                                <table class="table order-table order-table-2">
                                    <thead>
                                        <tr>
                                            <th>@lang('title.Product')</th>
                                            <th class="text-end">@lang('title.Total')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($cart as $item)
    	                                    <tr>
    	                                        <th>{{($item->products->{$attribute->tt('title')})}}
    	                                            <strong><span>&#10005;</span>{{ $item->quantity }}</strong>
    	                                        </th>
    	                                        <td class="text-end"><span class="lari">b</span>

    	                                        	<span id="currency">{{ $item->products->price * $item->quantity }}</span></td>
    	                                    </tr>
    	                                @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>@lang('title.Subtotal')</th>
                                            <td class="text-end"><span class="lari">b</span><span id="currency">{{ $sum }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>@lang('title.Shipping')</th>
                                            <td class="text-end">
                                                <span><span class="lari">b</span>
                                                    <span id="currency">49.00</span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>@lang('title.Order Total')</th>
                                            <td class="text-end">
                                                <span class="order-total-ammount"><span class="lari">b</span>
                                                    <span id="currency">{{ $sum + 49 }}</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button type="submit" class="btn btn-fullwidth btn-style-1 mt--50">@lang('title.Buy')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection