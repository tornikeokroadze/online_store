@extends('layouts.app')

@section('content')
    <section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="login-box">
                        <div class="sec-title text-center">
                            <h4>@lang('title.Reset Password')</h4>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST" class="form form--login">
                        @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label>@lang('title.Email')</label>
                                <input class="@error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>@lang('title.password')</label>
                                <input class="@error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>@lang('title.Repeat Password')</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-style-1 w-100">@lang('title.Reset Password')</a>
                            <a href="{{ route('login') }}" class="btn btn-style-2 w-100 mt--20">@lang('title.Login')</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
