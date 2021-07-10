@extends('admin.layout')

@section('content')
    
@php
    $formTitle = !empty($category) ? 'Perbarui' : 'Produk'    
@endphp

<div class="content">
    <div class="row">
        <div class="col-lg-4">
            @include('admin.products.product_menus')
        </div>
        <div class="col-lg-8">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Baru</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash', ['$errors' => $errors])
                    @if (!empty($product))
                        {!! Form::model($product, ['url' => ['admin/products', $product->id], 'method' => 'PUT']) !!}
                        {!! Form::hidden('id') !!}
                    @else
                        {!! Form::open(['url' => 'admin/products']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('sku', 'SKU') !!}
                            {!! Form::text('sku', null, ['class' => 'form-control', 'placeholder' => 'SKU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nama') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Harga') !!}
                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_ids', 'Kategori') !!}
                            {!! General::selectMultiLevel('category_ids[]', $categories, ['class' => 'form-control', 'multiple' => true, 'selected' => !empty(old('category_ids')) ? old('category_ids') : $categoryIDs, 'placeholder' => '-- Pilih Kategori --']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Deskripsi') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('weight', 'Berat') !!}
                            {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Berat (Kilogram)']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('origin', 'Asal') !!}
                            {!! Form::text('origin', null, ['class' => 'form-control', 'placeholder' => 'Asal']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', $statuses , null, ['class' => 'form-control', 'placeholder' => '-- Pilih Status --']) !!}
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{ url('admin/products') }}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection