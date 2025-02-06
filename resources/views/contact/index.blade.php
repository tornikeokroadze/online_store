@extends('layouts.app') 

@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',($contact->{$attribute->tt('seo_description')}))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',($contact->{$attribute->tt('seo_keywords')}))
@section('linkage','https://parfume.ge/'.App::getLocale().'/contact')
@section('url','https://parfume.ge/'.App::getLocale().'/contact')

@section('content')
	<section class="featured-product-area faq-section section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mt-5">
                    @if($contact->phone)
	                  <div class="col-lg-6">
	                    <div class="coursesCard">
	                      <div class="contact-info">
	                        <p>@lang('title.telephone'):</p>
	                        @if($contact->phone)
	                            <a href="tel:{{$contact->phone}}">
	                                <h3>{{$contact->phone}}</h3>
	                            </a>
	                        @endif
	                      </div>
	                    </div>
	                  </div>
	              @endif
	              @if($contact->email)
	                  <div class="col-lg-6">
	                    <a href="mailto:{{$contact->email}}" class="coursesCard">
	                      <div class="contact-info">
	                        <p>@lang('title.e-mail'):</p>
	                        <h3>{{$contact->email}}</h3>
	                      </div>
	                    </a>
	                  </div>
	              @endif
	              @if(($contact->{$attribute->tt('address')}))
	                  <div class="col-lg-6">
	                    <a href="https://www.google.ge/maps/{{($contact->{$attribute->tt('address')})}}" target="_blank" class="coursesCard">
	                      <div class="cat-icon"><img src="{{asset('img/icons/address.svg') }}" alt=""></div>
	                      <div class="contact-info">
	                        <p>@lang('title.address'):</p>
	                        <h3>{{($contact->{$attribute->tt('address')})}}</h3>
	                      </div>
	                    </a>
	                  </div>
	              @endif
                </div>
            </div>
        </div>
    </section>
@endsection