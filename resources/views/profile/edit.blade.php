@extends('layouts.app')

@section('content')
	
	<section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-tab tab-style-3">
                        <div class="nav nav-tabs product-tab__head justify-content-center align-items-center flex-wrap mb--30" id="product-tab" role="tablist">
                            @if(!$user->google_id)
                                <button type="button" class="product-tab__link nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" role="tab" aria-selected="true">
                                    <span>@lang('title.Personal info')</span>
                                </button>
                            @endif
                            <button type="button" class="product-tab__link nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" role="tab" aria-selected="false">
                                <span>@lang('title.My orders')</span>
                            </button>
                            @if($user->password)
                                <button type="button" class="product-tab__link nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" role="tab" aria-selected="false">
                                    <span>@lang('title.Change Password')</span>
                                </button>
                            @endif
                            <button type="button" class="product-tab__link nav-link">
                                <span onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    @lang('title.Logout')</span>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                            </button>
                        </div>
                        <div class="tab-content product-tab__content" id="product-tabContent">
                            <div class="tab-pane show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab">
                                <div class="row justify-content-center pt--30">
                                    <div class="col-xl-7">
                                        @include('profile.partials.update-user')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">
                                <div class="row justify-content-center pt--30">
                                    <div class="col-xl-12">
                                        <div class="table-content table-responsive orders-table">
                                          	@include('profile.partials.profile-orders')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">
                                <div class="row justify-content-center pt--30">
                                    <div class="col-xl-5">
                                        @include('profile.partials.update-password')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection