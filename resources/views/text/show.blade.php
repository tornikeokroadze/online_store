@extends('layouts.app') 

@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')


@section('content')
	
	<section class="section-paddings wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="sec-title text-center">
                        <h4>{{($text->{$attribute->tt('title')})}}</h4>
                    </div>
                    <div class="text-block mtb--30">
                        <p>{!! ($text->{$attribute->tt('text')}) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection