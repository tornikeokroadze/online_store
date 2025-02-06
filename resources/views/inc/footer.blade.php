<footer class="footer footer-3 bg--gray wow fadeInUp" data-wow-duration="3000ms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title widget-title--2">@lang('title.Helpful Links')</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="widget-menu widget-menu--2">
                                @foreach($footer_pages as $item)
                                    <li><a href="{{ asset('text/'.$item->id) }}">{{($item->{$attribute->tt('title')})}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="widget-menu widget-menu--2">
                                <li><a href="{{asset('faq')}}">@lang('title.faq')</a></li>
                                <li><a href="{{asset('contact')}}">@lang('title.Contact')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-widget">
                    <h3 class="widget-title widget-title--2 widget-title--icon">@lang('title.BTF')</h3>
                    <form action="{!! route('message.send') !!}" method="POST" class="newsletter-form">
                    @csrf
                        <input type="email" id="email" placeholder="@lang('title.e-mail')" name="email" required class="newsletter-form__input">
                        <button type="submit" class="newsletter-form__submit">
                            <i class="dl-icon-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-20">
            <div class="col-md-4">
                <div class="footer-payments">
                    <ul>
                        <li><a href="#"><img src="{{ asset('img/payment/american_express.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('img/payment/mastercard.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('img/payment/apple-pay') }}.svg" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('img/payment/visa.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('img/payment/paypal.svg') }}" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 text-md-center">
                <p class="copyright-text">Copyright © 2023 Created By <a title="Web studio" href="http://integrals.ge/" target="_blank">Integral Web Studio</a>.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <ul class="social social-small">
                    @if($contact->facebook)
                        <li class="social__item">
                            <a href="{{$contact->facebook}}" target="_blank" class="social__link">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                    @endif

                    @if($contact->instagram)
                        <li class="social__item">
                            <a href="{{$contact->facebook}}" target="_blank" class="social__link">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    @endif

                    @if($contact->youtube)
                        <li class="social__item">
                            <a href="{{$contact->youtube}}" target="_blank" class="social__link">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    @endif

                    @if($contact->linkedin)
                        <li class="social__item">
                            <a href="{{$contact->linkedin}}" target="_blank" class="social__link">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="searchform__popup" id="searchForm">
    <div class="searchform__body">
        <form action="/search" class="searchform">
            <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
            <input type="text" name="q"  value="{{@$q}}" id="search" class="searchform__input" placeholder="@lang('title.search')" autofocus>
            <button type="submit" class="searchform__submit"><i class="dl-icon-search4"></i></button>
        </form>
    </div>
</div>
@auth

    <aside class="mini-cart" id="miniWish">
        <div class="mini-cart-wrapper">
            <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="mini-cart-inner">
                <div class="mini-cart__content" id="wishlistLists">
                    <ul class="mini-cart__list">
                        @foreach($wishlist as $item)
                            <li class="mini-cart__product">
                                <button style="border: none; background: none;" type="button" onclick="wishlist({{$item->id}},'trash')" class="remove-from-cart remove"><i class="dl-icon-close"></i></button>

                                <a href="{{ asset('products/'.$item->products_id) }}">
                                    <div class="mini-cart__product__image">
                                        <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->{$attribute->tt('title')})}}">
                                    </div>
                                </a>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="{{ asset('products/'.$item->products_id) }}">{{($item->products->{$attribute->tt('title')})}}</a>
                                    <span class="mini-cart__product__quantity"> <span class="lari">b</span> <span id="currency">{{ $item->products->price }}</span></span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mini-cart__buttons">
                        <a href="{{asset('wishlist')}}" class="btn btn-fullwidth btn-style-1">@lang('title.View wishlist')</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>


    <aside class="mini-cart" id="miniCart">
        <div class="mini-cart-wrapper">
            <a href="" class="btn-close"><i class="dl-icon-close"></i></a>
            <div class="mini-cart-inner">
                <div class="mini-cart__content" id="cartLists">
                    <ul class="mini-cart__list" >
                        @foreach($cart as $item)
                            <li class="mini-cart__product">
                                    <button style="border: none; background: none;" type="button" onclick="cart({{$item->id}},'trash')" class="remove-from-cart remove"><i class="dl-icon-close"></i></button>

                                <a href="{{ asset('products/'.$item->products_id) }}">
                                    <div class="mini-cart__product__image">
                                        <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->{$attribute->tt('title')})}}">
                                    </div>
                                </a>
                                <div class="mini-cart__product__content">
                                    <a class="mini-cart__product__title" href="{{ asset('products/'.$item->products_id) }}">{{($item->products->{$attribute->tt('title')})}}</a>
                                    <span class="mini-cart__product__quantity">{{ $item->quantity }} x <span class="lari">b</span><span id="currency">{{ $item->products->price }}</span></span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="mini-cart__total">
                        <span>@lang('title.Subtotal')</span>
                        <span class="ammount"><span class="lari">b</span>
                            <span id="currency">{{$sum_cart}}</span>
                        </span>
                    </div>
                    <div class="mini-cart__buttons">
                        <a href="{{asset('cart')}}" class="btn btn-fullwidth btn-style-1">@lang('title.View Cart')</a>
                        @if(count($cart) > 0)
                            <a href="{{asset('checkout')}}" class="btn btn-fullwidth btn-style-1">@lang('title.Checkout')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </aside>
@endauth

<div class="ai-global-overlay"></div>