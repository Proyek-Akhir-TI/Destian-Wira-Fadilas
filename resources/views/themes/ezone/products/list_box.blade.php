<div class="col-lg-12">
    <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
        <div class="product-img list-img-width">
            <a href="{{ url('product/'. $product->slug) }}">
                @if ($product->productImages->first())
					<img src="{{ asset('storage/'.$product->productImages->first()->medium) }}" alt="{{ $product->name }}">
				@else
					<img src="{{ asset('themes/ezone/assets/img/product/fashion-colorful/1.jpg') }}" alt="{{ $product->name }}">
				@endif
            </a>

            
        </div>
        <div class="product-content-list">
            <div class="product-list-info">
                <span><h4><a href="{{ url('product/'. $product->slug) }}">{{ $product->name }}</a></h4></span>
                <h6><a>{{ $product->user->first_name }} - </a><a>{{ $product->origin }}</a></h6>
                <span>{{ number_format($product->priceLabel()) }}</span>
                <p>{!! $product->description !!}</p>
            </div>
            <div class="product-list-cart-wishlist">
                <div class="product-list-cart">
                <a class="btn-hover list-btn-style add-to-card" href="" product-id="{{ $product->id }}" product-type="{{ $product->type }}" product-slug="{{ $product->slug }}">add to cart</a>
                </div>
                <div class="product-list-wishlist">
                    <a class="btn-hover list-btn-wishlist add-to-fav" title="Favorite" product-slug="{{ $product->slug }}" href="">
                        <i class="pe-7s-like"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>