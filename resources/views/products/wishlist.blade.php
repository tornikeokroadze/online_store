<ul class="mini-cart__list">
    @foreach($wishlist as $item)
        <li class="mini-cart__product">
            <button style="border: none; background: none;" type="button" onclick="wishlist({{$item->id}},'trash')" class="remove-from-cart remove"><i class="dl-icon-close"></i></button>
            <a href="{{ asset('products/'.$item->products_id) }}">
                <div class="mini-cart__product__image">
                    <img src="{{ asset('img/products/'.$item->products->image) }}" alt="{{($item->products->{$attribute->tt('title')})}}">
                </div>
            </a>
            <div class="mini-cart__product__content">
                <a class="mini-cart__product__title" href="{{ asset('products/'.$item->products_id) }}">{{($item->products->{$attribute->tt('title')})}}</a>
                <span class="mini-cart__product__quantity"> <span class="lari">b</span> <span id="currency">{{ $item->products->price }}</span></span>
            </div>
        </li>
    @endforeach
</ul>
<div class="mini-cart__buttons">
    <a href="{{asset('wishlist')}}" class="btn btn-fullwidth btn-style-1">@lang('title.View wishlist')</a>
</div>