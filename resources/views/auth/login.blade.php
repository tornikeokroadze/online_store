@extends('layouts.app')

@section('content')


    <section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="login-box">
                        <div class="sec-title text-center">
                            <h4>@lang('title.log in')</h4>
                        </div>
                        <form action="{{ route('login') }}" method="POST" class="form form--login">
                        @csrf
                            <div class="form-group">
                                <label>@lang('title.Email')</label>
                                <input class="@error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form__label">@lang('title.password')</label>
                                <input type="password" class="form__input form__input--3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="check-box">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">@lang('title.remember me')</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <a href="{{ route('google-auth') }}">
                                            <button type="button" class="login-with-google-btn" >
                                              Sign in with Google
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-style-1 w-100 mb--20">@lang('title.login')</button>
                            @if (Route::has('password.request'))
                                <a class="forgot-pass" href="{{ route('password.request') }}">@lang('title.Forgot your password')?</a>
                            @endif
                            <a href="{{ route('register') }}" class="btn btn-style-2 w-100 mt--20">@lang('title.Create an account')</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
