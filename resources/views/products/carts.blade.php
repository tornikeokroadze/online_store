<ul class="mini-cart__list" >
    @foreach($cart as $item)
        <li class="mini-cart__product">
            <button style="border: none; background: none;" type="button" onclick="cart({{ $item->id }},'trash')" class="remove-from-cart remove"><i class="dl-icon-close"></i></button>

            <a href="{{ asset('products/'.$item->products_id) }}">
                <div class="mini-cart__product__image">
                    <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->{$attribute->tt('title')})}}">
                </div>
            </a>
            <div class="mini-cart__product__content">
                <a class="mini-cart__product__title" href="{{ asset('products/'.$item->products_id) }}">{{ ($item->products->{$attribute->tt('title')}) }}</a>
                <span class="mini-cart__product__quantity">{{ $item->quantity }} x
                    <span class="lari">b</span>
                    <span id="currency">{{ $item->products->price }}</span>
                </span>
            </div>
        </li>
    @endforeach
</ul>
<div class="mini-cart__total">
    <span>@lang('title.Subtotal')</span>
    <span class="ammount"><span class="lari">b</span>
        <span id="currency">{{ $sum_cart }}</span>
    </span>
</div>
<div class="mini-cart__buttons">
    <a href="{{asset('cart')}}" class="btn btn-fullwidth btn-style-1">@lang('title.View Cart')</a>
    @if(count($cart) > 0)
        <a href="{{asset('checkout')}}" class="btn btn-fullwidth btn-style-1">@lang('title.Checkout')</a>
    @endif
</div>