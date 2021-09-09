@extends('admin.layout-seller')

@section('content')
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Payment Report</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						@include('admin.reports.filter')
						<table class="table table-bordered table-striped">
							<thead>
								<th>ID Pesanan</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Jumlah</th>
								<th>Gateway</th>
								<th>Tipe Pembayaran</th>
								<th>Ref</th>
							</thead>
							<tbody>
								@forelse ($payments as $payment)
									<tr>    
										<td>{{ $payment->code }}</td>
										<td>{{ \General::datetimeFormat($payment->created_at) }}</td>
										<td>{{ $payment->status }}</td>
										<td>{{ \General::priceFormat($payment->amount) }}</td>
										<td>{{ $payment->method }}</td>
										<td>{{ $payment->payment_type }}</td>
										<td>{{ $payment->token }}</td>
									</tr>
								@empty
									<tr>
										<td colspan="8">No records found</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection