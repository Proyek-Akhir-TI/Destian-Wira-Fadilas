<div class="shop-sidebar mr-50">
    <form method="GET" action="{{ url('products')}}">
		<div class="sidebar-widget mb-40">
			<h3 class="sidebar-title">Urutkan sesuai harga</h3>
			<div class="price_filter">
				<div id="slider-range"></div>
				<div class="price_slider_amount">
					<div class="label-input">
						<label>harga : </label>
						<input type="text" id="amount" name="price"  placeholder="Add Your Price" style="width:170px" />
						<input type="hidden" id="productMinPrice" value="{{ $minPrice }}"/>
						<input type="hidden" id="productMaxPrice" value="{{ $maxPrice }}"/>
					</div>
					<button type="submit" >Urutkan</button> 
				</div>
			</div>
		</div>
    </form>
    @if ($categories)
		<div class="sidebar-widget mb-45">
			<h3 class="sidebar-title">Kategori</h3>
			<div class="sidebar-categories">
				<ul>
					@foreach ($categories as $category)
							<li><a href="{{ url('products?category='. $category->slug) }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif
    
    @if ($ukurans)
		<div class="sidebar-widget mb-40">
			<h3 class="sidebar-title">ukuran</h3>
			<div class="product-size">
				<ul>
					@foreach ($ukurans as $ukuran)
						<li><a href="{{ url('products?option='. $ukuran->id) }}">{{ $ukuran->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif

</div>