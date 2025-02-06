@if($order)
	<div class="container">

		<div class="row">
	        <div class="col-12">
	            <div class="row justify-content-center pt--30">
	                <div class="col-xl-12">
	                    <div class="table-content table-responsive orders-table">
	                      <table class="table table-responsive">
	                          <thead>
	                              <tr class="cart-product">
	                                   <th class="order-product">@lang('title.Order ID')</th>
	                                   <th class="order-product">@lang('title.Total Amount')</th>
	                                   <th class="order-product">@lang('title.Date')</th>
	                              </tr>
	                          </thead>
	                          <tbody>
	                              <tr class="cart-product">
	                                   <td>#{{$order->id}}</td>
	                                   <td>{{$order->total}}</td>
	                                   <td>{{$order->created_at}}</td>
	                              </tr>
	                            </tbody>
	                      </table>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>


	    <div class="col-lg-7 mb-md--30">
	        <div class="row g-0">
	            <div class="col-12">
	                <div class="table-content table-responsive">
	                    <table class="table text-center">
	                        <thead>
	                            <tr>
	                                <th class="text-start">@lang('title.Product')</th>
	                                <th>@lang('title.Price')</th>
	                                <th>@lang('title.Quantity')</th>
	                                <th>@lang('title.Total')</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach($attribute->product_arr($order->product_array) as $key => $value)
	                                <tr>
	                                    <td class="product-name text-start wide-column">
	                                        <h5>{{($value->{$attribute->tt('title')})}}</h5>
	                                    </td>
	                                    <td class="product-price">
	                                        {{ $value->price }}
	                                    </td>
	                                    <td class="product-quantity">x {{json_decode($order->quantity_array)[$key]}}</td>
	                                    <td class="product-total-price">
	                                        <span class="product-price-wrapper">
	                                            {{ $value->price * json_decode($order->quantity_array)[$key] }}
	                                        </span>
	                                    </td>
	                                </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>

	</div>
@endif