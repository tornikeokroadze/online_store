@extends('layouts.app')

@section('content')
    <section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="login-box">
                        <div class="sec-title text-center">
                            <h4>@lang('title.Forgot your password')?</h4>
                        </div>
                        <form action="{{ route('password.email') }}" method="POST" class="form form--login">
                        @csrf
                            <div class="form-group">
                                <label>@lang('title.Email')</label>
                                <input class="@error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-style-1 w-100">@lang('title.restore password')</a>
                            <a href="{{ route('login') }}" class="btn btn-style-2 w-100 mt--20">@lang('title.Login')</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
