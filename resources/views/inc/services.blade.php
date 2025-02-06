@if(count($services)>0)
    <section class="services-section section-paddings pt-0 wow fadeInUp" data-wow-duration="2000ms">
        <div class="container-fluid">
            <div class="row justify-content-center">
            	@foreach($services as $item)
	                <div class="col-md-2">
	                    <div class="service-box">
	                        <img src="{{ asset('img/services/'.$item->image) }}">
	                        <h5>{{($item->{$attribute->tt('title')})}}</h5>
	                    </div>
	                </div>
	            @endforeach
            </div>
        </div>
    </section>
@endif