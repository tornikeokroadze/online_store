@extends('layouts.app') 

@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',trans('title.my profile').",  ".trans('seo.description'))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',trans('title.my profile').",  ".trans('seo.keywords'))
@section('linkage','https://parfume.ge/'.App::getLocale().'/dashboard')
@section('url','https://parfume.ge/'.App::getLocale().'/dashboard')


@section('content')
	<section class="featured-product-area faq-section section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="accordionExample">
                      	@foreach($faq as $key => $value)
	                      	<div class="card">
		                        <div class="card-head" id="headingOne{{$key}}">
			                        <h2 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="false" aria-controls="collapseOne{{$key}}">
			                              {{($value->{$attribute->tt('title')})}}
			                        </h2>
		                        </div>
		                        <div id="collapseOne{{$key}}" class="collapse" aria-labelledby="headingOne{{$key}}" data-bs-parent="#accordionExample">
			                        <div class="card-body">
			                            <p class="subheading-tag">{!! ($value->{$attribute->tt('text')}) !!}</p>
			                        </div>
		                        </div>
	                      	</div>
        				@endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection