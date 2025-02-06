
@extends('layouts.app') 

@section('content')

   <section class="section-paddings-3 wow fadeInUp" data-wow-duration="2000ms">
      <div class="container text-center">
         <i class="fa fa-check-circle s-icon"></i>
         <h1 class="mb-3 fs-20 text-center font-weight-400 text-uppercase">@lang('title.Payment Successful')!</h1>
         <p>@lang('title.Your payment was successfully processed').</p>
         <p>@lang('title.Thank you for choosing us')!</p>
         <div class="mt--20">
            <a href="/" class="btn btn-submit btn-style-1 mr--20">@lang('title.Home')</a>
            <a href="#" onclick="goBack();" class="btn btn-submit btn-style-2">@lang('title.Go Back')</a>
         </div>
      </div>
   </section>
@endsection