<table class="table text-center">
     <thead>
          <tr class="cart-product">
               <th class="order-product">@lang('title.Order ID')</th>
               <th class="order-product">@lang('title.Date')</th>
               <th class="order-product">@lang('title.Total Amount')</th>
               <th class="order-product">@lang('title.Order Status')</th>
               <th class="order-product">@lang('title.Payment Status')</th>
               <th class="order-product"></th>
          </tr>
     </thead>
     <tbody>
          @foreach($orders as $item)
               <tr class="cart-product">
                    <td>#{{$item->id}}</td>
                    <td>{{$item->created_at}}</td>
                    <td><span class="lari">b</span><span id="currency">{{ $item->total }}</span></td>
                    <td><span class="{{ $item->order_status === 'fnished' ? 'order-green' : ($item->order_status === 'cancelled' ? 'order-red' : 'order-orange') }}">{{$item->order_status}}</span></td>
                    <td><span class="{{ $item->payment_status === 'not payed' ? 'order-red' : 'order-green' }}">{{$item->payment_status}}</span></td>
                    <td><a href="{{asset('profile/'.$item->id) }}" class="btn btn-style-1">@lang('title.Order Details')</a></td>
               </tr>
          @endforeach
     </tbody>
</table>