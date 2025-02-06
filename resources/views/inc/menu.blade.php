<section class="header-top" id="top-comment">
    <div class="container-fluid">
        <div class="row align-items-center">
            @if(($contact->{$attribute->tt('header_title')}))
                <div class="col-md-12 text-center position-relative">
                    <span class="header-text">{{($contact->{$attribute->tt('header_title')})}}</span>
                    <a href="#" id="close-top-comment" class="close-top-comment-btn"><i class="dl-icon-close"></i></a>
                </div>
            @endif
        </div>
    </div>
</section>

<header class="header header-fullwidth header-style-3 fixed-header">
    <div class="header-outer">
        <div class="header-inner">
            <div class="header-middle">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-5 d-lg-block d-none">
                            <nav class="main-navigation">
                                <ul class="mainmenu mainmenu--2">
                                    
                                    <li class="mainmenu__item menu-item-has-children has-children">
                                        <a href="/">@lang('title.The House')
                                            <!-- <i class="fa fa-angle-right"></i> -->
                                        </a>
                                        <!-- <ul class="sub-menu">
                                            @foreach($category as $item)
                                                <li><a href="{{ asset('category/'.$item->id) }}">{{($item->{$attribute->tt('title')})}}</a></li>
                                            @endforeach
                                        </ul> -->
                                    </li>
                                    
                                    <li class="mainmenu__item"><a href="{{ asset('products') }}">@lang('title.Products')</a></li>
                                    <li class="mainmenu__item"><a href="{{ asset('cart') }}">@lang('title.cart')</a></li>
                                    <li class="mainmenu__item"><a href="{{ asset('wishlist') }}">@lang('title.wishlist')</a></li>
                                    <li class="mainmenu__item"><a href="{{ asset('contact') }}">@lang('title.Contact')</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-4 text-lg-center">
                            <a href="/" class="logo-box">
                                <figure class="logo--normal">
                                    <img src="{{ asset('img/contact/'.$contact->logo) }}" alt="logo">
                                </figure>
                            </a>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-8">
                            <div class="header-middle-right">
                                <ul>
                                    <li class="header-toolbar__item user-info-menu-btn header-lang"><a data-curr="USD"  href="#">USD</a></li>
                                    <li class="header-toolbar__item user-info-menu-btn header-lang"><a data-curr="GEL" href="#">GEL</a></li>
                                </ul>
                                <ul class="header-toolbar text-end">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if(App::getLocale()!=$localeCode)
                                            <li class="header-toolbar__item user-info-menu-btn header-lang">
                                                <a hreflang="{{App::getLocale()}}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="{{ (App::getLocale()==$localeCode) ? 'active' : '' }}">{{$localeCode}}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    <li class="header-toolbar__item">
                                        <a href="#searchForm" class="search-btn toolbar-btn">
                                            <i class="dl-icon-search4"></i>
                                        </a>
                                    </li>
                                    
                                    <li class="header-toolbar__item user-info-menu-btn">
                                        <a href="{{ asset('profile') }}">
                                            <i class="dl-icon-user5"></i>
                                        </a>
                                        @guest
                                            <ul class="user-info-menu">
                                                @if (Route::has('login'))
                                                    <li><a href="{{ route('login') }}">@lang('title.Login')</a></li>
                                                @endif
                                                @if (Route::has('register'))
                                                    <li><a href="{{ route('register') }}">@lang('title.register')</a></li>
                                                @endif
                                            </ul>
                                        @else
                                            <ul class="user-info-menu">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    @lang('title.Logout')
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        @endguest
                                    </li>
                                    
                                    @auth    
                                        <li class="header-toolbar__item">
                                            <a href="#miniCart" class="mini-cart-btn toolbar-btn">
                                                <i class="dl-icon-cart4"></i>
                                                <sup id="cart-count" class="mini-cart-count">0</sup>
                                            </a>
                                        </li>
                                        <li class="header-toolbar__item">
                                            <a href="#miniWish" class="mini-cart-btn toolbar-btn">
                                                <i class="dl-icon-heart3"></i>
                                                <sup id="wishlist-count" class="mini-wishlist-count">0</sup>
                                            </a>
                                        </li>
                                    @endauth
                                    <li class="header-toolbar__item d-lg-none">
                                        <a href="#offcanvas-nav" class="toolbar-btn">
                                            <i class="dl-icon-menu1"></i>
                                        </a>              
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-sticky-header-height"></div>
    </div>
</header>

<aside class="offcanvas-navigation" id="offcanvas-nav">
    <div class="offcanvas-navigation__inner">
        <a href="" class="btn-close">
            <i class="dl-icon-close"></i>
            <span class="sr-only"></span>
        </a>
        <div class="offcanvas-navigation__top">
            <ul class="offcanvas-menu">
                <li class="mainmenu__item menu-item-has-children has-children">
                    <a href="/">@lang('title.The House')</a>
                    <!-- <ul class="sub-menu">
                        @foreach($category as $item)
                            <li><a href="{{ asset('category/'.$item->id) }}">{{($item->{$attribute->tt('title')})}}</a></li>
                        @endforeach
                    </ul> -->
                </li>
                <li class="mainmenu__item"><a href="{{ asset('products') }}">@lang('title.Products')</a></li>
                <li class="mainmenu__item"><a href="{{ asset('cart') }}">@lang('title.cart')</a></li>
                <li class="mainmenu__item"><a href="{{ asset('wishlist') }}">@lang('title.wishlist')</a></li>
                <li class="mainmenu__item"><a href="{{ asset('contact') }}">@lang('title.Contact')</a></li>
            </ul>
        </div>
    </div>
</aside>