<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="meta description">
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="assets/img/icon.png">

        <title>@yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/dl-icon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/plugins.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/revoulation.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom-animate.css')}}">
        <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('fav/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('fav/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('fav/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('fav/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('fav/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('fav/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('fav/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('fav/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('fav/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('fav/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('fav/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('fav/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">

    </head>

    <body>   

        @include('inc.loader') 
        <div class="wrapper">
            @include('inc.menu')
            @if(Request::segment(2) !== null)
                @include('inc.segment')
            @endif
            <div id="content" class="main-content-wrapper">
                @include('inc.message')
                @yield('content')
            </div>
            @include('inc.footer')
        </div>


        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/anim/wow.js') }}"></script>
        <script src="{{ asset('js/anim/script.js') }}"></script>
        <script src="{{ asset('js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('js/lg.js') }}"></script>
        <script src="{{ asset('js/main.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('js/revolution.extension.video.min.js') }}"></script>
        <script src="{{ asset('js/revoulation.js') }}"></script>

        @if(Request::segment(2) === 'contact')
          <script src="https://maps.google.com/maps/api/js?key=AIzaSyCq6i9m9Fj6zWJwmVujSZUw0E8M54WF53M"></script>
          <script type="text/javascript"src="{{ asset('js/google-map-init-multilocation.js') }}"></script>
        @endif

        <script type="text/javascript">
            $(document).ready(function(){
              $('.slider-fade').slick({
                fade: true,
                speed: 2000,
                cssEase: 'linear'
              });
            });



            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    var success = document.getElementById('success');
                    var error = document.getElementById('error');
                    var status = document.getElementById('status');
                    if (success) {
                        success.style.display = 'none';
                    }
                    if (error) {
                        error.style.display = 'none';
                    }
                    if (status) {
                        status.style.display = 'none';
                    }
                }, 4000);
            });


            function goBack() {
                window.history.back();
            }


            //დოლარში გადაყვანა
                function updatePrices(currency) {
                    $("span#currency").each(function() {
                        let $this = $(this);
                        let price = $this.data("price");

                        if (price === undefined) {
                            let price_text = $this.text().trim();
                            price = parseFloat(price_text);

                            if (!isNaN(price)) {
                                $this.data("price", price);
                            } else {
                                return;
                            }
                        }

                        let converted_price;
                        if (currency === "USD") {
                            converted_price = price / {{$currency->gel_usd()}};
                            $(".lari").text("$");
                        } else {
                            converted_price = price;
                            $(".lari").text("b");
                        }

                        $this.text(converted_price.toFixed(0));
                    });
                }

                $(document).ready(function() {
                    let last_currency = localStorage.getItem("currency");
                    if (last_currency !== null) {
                        updatePrices(last_currency);
                    }

                    $("a[data-curr]").click(function(e) {
                        e.preventDefault();
                        let currency = $(this).attr("data-curr");
                        updatePrices(currency);

                        localStorage.setItem("currency", currency);
                    });
                });

        </script>

    </body>   
</html>
