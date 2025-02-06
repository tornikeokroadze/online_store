@extends('layouts.app')

@section('content')
    <section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="login-box">
                        <div class="sec-title text-center">
                            <h4>@lang('title.Create an account')</h4>
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="form form--login row">
                        @csrf
                            <div class="form-group">
                                <div class="gender-radios">
                                    <div class="check-box">
                                        <input type="radio"  id="gender-radio1" name="gender" value="{{ old('gender') }}" required>
                                        <label for="gender-radio1">@lang('title.male')</label>
                                    </div>
                                    <div class="check-box">
                                        <input type="radio" id="gender-radio2" name="gender" value="{{ old('gender') }}" required>
                                        <label for="gender-radio2">@lang('title.female')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.First Name')</label>
                                <input class="@error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.Last Name')</label>
                                <input class="@error('surname') is-invalid @enderror" type="text" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.Email')</label>
                                <input class="@error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.Date of birth')</label>
                                <input class="@error('date') is-invalid @enderror" type="date" name="date" value="{{ old('date') }}" required autocomplete="date">
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.password')</label>
                                <input class="@error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>@lang('title.Repeat Password')</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group col-lg-6">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-style-1 w-100">@lang('title.register')</a>
                                <a href="{{ route('login') }}" class="btn btn-style-2 w-100 mt--20">@lang('title.Login')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
