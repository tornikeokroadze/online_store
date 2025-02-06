@extends('layouts.app') 

@section('title',($contact->{$attribute->tt('seo_title')}))
@section('description',($contact->{$attribute->tt('seo_description')}))
@section('image',asset('img/contact/'.$contact->image))
@section('keywords',($contact->{$attribute->tt('seo_keywords')}))
@section('linkage','https://parfume.ge/'.App::getLocale().'/401')
@section('url','https://parfume.ge/'.App::getLocale().'/401')

@section('content')



    <section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container text-center">
            <span class="page-nf">401</span>
            <div class="mt--20">
                <a href="/" class="btn btn-submit btn-style-1 mr--20">@lang('title.Home')</a>
                <a href="#" onclick="goBack();" class="btn btn-submit btn-style-2">@lang('title.Go Back')</a>
            </div>
        </div>
    </section>


@endsection