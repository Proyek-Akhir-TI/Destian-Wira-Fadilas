@extends('themes.ezone.layout')

@section('content')
	<!-- header end -->
	<!-- <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpg') }})">
		<div class="container">
			<div class="breadcrumb-content text-center">
				<h2>Pesanan Dibuat</h2>
				<ul>
					<li><a href="{{ url('/') }}">beranda</a></li>
					<li>Pesanan Dibuat</li>
				</ul>
			</div>
		</div>
	</div> -->
	<!-- checkout-area start -->
	<div class="cart-main-area  ptb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					@include('admin.partials.flash', ['$errors' => $errors])
					<h1 class="cart-heading">Pesanan Anda:</h4>
					<div class="row">
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Tagihan</p>
							<address>
								{{ $order->customer_first_name }} {{ $order->customer_last_name }}
								<br> {{ $order->customer_address1 }}
								<br> {{ $order->customer_address2 }}
								<br> Email: {{ $order->customer_email }}
								<br> Telepon: {{ $order->customer_phone }}
								<br> Kode Pos: {{ $order->customer_postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Alamat Pengiriman</p>
							<address>
								{{ $order->shipment->first_name }} {{ $order->shipment->last_name }}
								<br> {{ $order->shipment->address1 }}
								<br> {{ $order->shipment->address2 }}
								<br> Email: {{ $order->shipment->email }}
								<br> Telepon: {{ $order->shipment->phone }}
								<br> Kode Pos: {{ $order->shipment->postcode }}
							</address>
						</div>
						<div class="col-xl-3 col-lg-4">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Rincian</p>
							<address>
								ID Tagihan:
								<span class="text-dark">#{{ $order->code }}</span>
								<br> {{ \General::datetimeFormat($order->order_date) }}
								<br> Dikirim dengan: {{ $order->shipping_service_name }}
							</address>
						</div>
					</div>
					<div class="table-content table-responsive">
						<table class="table mt-3 table-striped table-responsive table-responsive-large" style="width:100%">
							<thead>
								<tr>
									<th>#</th>
									<th>Produk</th>
									<th>Variasi</th>
									<th>Jumlah</th>
									<th>Harga</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($order->orderItems as $item)
									<tr>
										<td>{{ $item->sku }}</td>
										<td>{{ $item->name }}</td>
										<td>{!! \General::showAttributes($item->attributes) !!}</td>
										<td>{{ $item->stock }}</td>
										<td>{{ \General::priceFormat($item->base_price) }}</td>
										<td>{{ \General::priceFormat($item->sub_total) }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">Pesanan tidak ditemukan!</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-5 ml-auto">
							<div class="cart-page-total">
								<ul>
									<li> Subtotal
										<span>{{ \General::priceFormat($order->base_total_price) }}</span>
									</li>
									<li>Pajak (10%)
										<span>{{ \General::priceFormat($order->tax_amount) }}</span>
									</li>
									<li>Biaya Pengiriman
										<span>{{ \General::priceFormat($order->shipping_cost) }}</span>
									</li>
									<li>Total
										<span>{{ \General::priceFormat($order->grand_total) }}</span>
									</li>
								</ul>
								@if (!$order->isPaid())
									<a href="{{ $order->payment_url }}">Lanjutkan Ke Pembayaran</a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection