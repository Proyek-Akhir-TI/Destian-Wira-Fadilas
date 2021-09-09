@extends('admin.layout-seller')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Pengiriman</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>ID Pesanan</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Total Stok</th>
                                <th>Total Berat (gram)</th>
                                <th>Tindakan</th>
                            </thead>
                            <tbody>
                                @forelse ($shipments as $shipment)
                                    <tr>    
                                        <td>
                                            {{ $shipment->order->code }}<br>
                                            <span style="font-size: 12px; font-weight: normal"> {{\General::datetimeFormat($shipment->order->order_date) }}</span>
                                        </td>
                                        <td>{{ $shipment->order->customer_full_name }}</td>
                                        <td>
                                            {{ $shipment->status }}
                                            <br>
                                            <span style="font-size: 12px; font-weight: normal"> {{ $shipment->shipped_at }}</span>
                                        </td>
                                        <td>{{ $shipment->total_stock }}</td>
                                        <td>{{ \General::priceFormat($shipment->total_weight) }}</td>
                                        <td>
                                            @can('edit_orders')
                                                <a href="{{ url('admin/orders/'. $shipment->order->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Tidak ditemukan data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $shipments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection