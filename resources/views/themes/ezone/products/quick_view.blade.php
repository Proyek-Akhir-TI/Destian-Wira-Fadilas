<div class="modal-dialog modal-quickview-width" role="document">
	<div class="modal-content">
		<div class="modal-body">

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span class="pe-7s-close" aria-hidden="true"></span>
		</button>
			<div class="qwick-view-left">
				<div class="quick-view-large-img">
					<div class="quick-view-tab-content tab-content">
						@php
							$i = 1
						@endphp
						@foreach ($product->productImages as $image)
							<div class="tab-pane fade {{ ($i == 1) ? 'active show' : '' }}" id="modal{{ $i}}" role="tabpanel">
								@if ($image->medium)
									<img src="{{ asset('storage/'.$image->medium) }}" alt="{{ $product->name }}" style="width:320px;">
								@else
									<img src="{{ asset('themes/ezone/assets/img/quick-view/l3.jpg') }}" alt="">
								@endif
							</div>
							@php
								$i++
							@endphp
						@endforeach
					</div>
				</div>
				<div class="quick-view-list nav" role="tablist">
					@php
						$i = 1
					@endphp
					@foreach ($product->productImages as $image)
						<a class="{{ ($i == 1) ? 'active' : '' }} mr-12" href="#modal{{ $i }}" data-toggle="tab" role="tab">
							@if ($image->small)
								<img src="{{ asset('storage/'.$image->small) }}" alt="{{ $product->name }}" style="width:100px; height:112px">
							@else
								<img src="{{ asset('themes/ezone/assets/img/quick-view/s3.jpg') }}" alt="{{ $product->name }}">
							@endif
						</a>
						@php
							$i++
						@endphp
					@endforeach
				</div>
			</div>
			<div class="qwick-view-right">
				<div class="qwick-view-content">
					<h3>{{ $product->name }}</h3>
					<div class="price">
						<span class="new">{{ number_format($product->priceLabel()) }}</span>
						{{-- <span class="old">$120.00  </span> --}}
					</div>
					<span>{{ $product->description }}</span>
					<p>Stok : <a>{{ $product->productInventory->stock }}</a></p>

					{!! Form::open(['url' => 'carts']) !!}
						{{ Form::hidden('product_id', $product->id) }}
						@if ($product->configurable())
							<div class="quick-view-select">
								<div class="select-option-part">
									<label>Ukuran*</label>
									{!! Form::select('ukuran', $ukuran , null, ['class' => 'select', 'placeholder' => '- Pilihan -', 'required' => true]) !!}
								</div>
							</div>
						@endif

						<div class="quickview-plus-minus">
							<div class="cart-plus-minus">
								{!! Form::number('stock', 1, ['class' => 'cart-plus-minus-box-quick', 'placeholder' => 'stock', 'min' => 1]) !!}
							</div>
							<div class="quickview-btn-cart">
								<button type="submit" class="submit contact-btn btn-hover">tambah ke keranjang</button>
							</div>
							<div class="quickview-btn-wishlist">
								<a class="btn-hover add-to-fav" product-slug="{{ $product->slug }}" href=""><i class="pe-7s-like"></i></a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>