@extends('admin.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Toko</h2>
                    </div>
                    <div class="card-body">
                        @include('admin.partials.flash')
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>Nama Toko</th>
                                
                                <th>Status</th>
                                <th style="width:15%">Tindakan</th>
                            </thead>
                            <tbody>
                                @forelse ($shops as $shop)
                                    <tr>    
                                        <td>{{ $shop->id }}</td>
                                        <td>{{ $shop->name }}</td>
                                        
                                        <td>{{ $shop->statusLabel() }}</td>
                                        <td>
                                            <a href="{{ url('admin/shops/'. $shop->id .'/edit') }}" class="btn btn-warning btn-sm">Ubah</a>
                                            
                                            @can('delete_shops')
                                            {!! Form::open(['url' => 'admin/shops/'. $shop->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                            {!! Form::hidden('_method', 'DELETE') !!}
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Tidak ada data yang ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $shops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection