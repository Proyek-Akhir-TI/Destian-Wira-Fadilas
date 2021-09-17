@extends('themes.ezone.layout')

@section('content')
	<!-- header end -->
	<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('themes/ezone/assets/img/bg/penjual.jpg') }})">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>halaman keranjang</h2>
				<ul>
					<li><a href="{{ url('/') }}">beranda</a></li>
					<li> halaman keranjang</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- shopping-cart-area start -->
	<div class="cart-main-area pt-95 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="cart-heading">Keranjang</h1>
					{!! Form::open(['url' => 'carts/update']) !!}
						<div class="table-content table-responsive">
							<table>
								<thead>
									<tr>
										<th>Hapus</th>
										<th>Gambar</th>
										<th>Produk</th>
										<th>Harga</th>
										<th>Kuantitas</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
									@forelse ($items as $item)
										@php
											$product = isset($item->associatedModel->parent) ? $item->associatedModel->parent : $item->associatedModel;
											$image = !empty($product->productImages->first()) ? asset('storage/'.$product->productImages->first()->path) : asset('themes/ezone/assets/img/cart/3.jpg')
										@endphp
										<tr>
											<td class="product-remove">
												<a href="{{ url('carts/remove/'. $item->id)}}" class="delete"><i class="pe-7s-close"></i></a>
											</td>
											<td class="product-thumbnail">
												<a href="{{ url('product/'. $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px"></a>
											</td>
											<td class="product-name"><a href="{{ url('product/'. $product->slug) }}">{{ $item->name }}</a></td>
											<td class="product-price-cart"><span class="amount">{{ number_format($item->price) }}</span></td>
											<td class="product-quantity">
												{{-- <input name="" value="{{ $item->quantity }}" type="number" min="1"> --}}
												{!! Form::number('items['. $item->id .'][quantity]', $item->quantity, ['min' => 1, 'required' => true]) !!}
											</td>
											<td class="product-subtotal">{{ number_format($item->price * $item->quantity)}}</td>
										</tr>
									@empty
										<tr>
											<td colspan="6">Keranjang sedang kosong!</td>
										</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="coupon-all">
									<div class="coupon2">
										<input class="button" name="update_cart" value="Perbarui keranjang" type="submit">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 ml-auto">
								<div class="cart-page-total">
									<h2>Jumlah Keranjang</h2>
									<ul>
										<li>Subtotal<span>{{ number_format(\Cart::getSubTotal()) }}</span></li>
										<li>Total<span>{{ number_format(\Cart::getTotal()) }}</span></li>
									</ul>
									<a href="{{ url('orders/checkout')}}">Melanjutkan ke checkout</a>
								</div>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<!-- shopping-cart-area end -->
@endsection