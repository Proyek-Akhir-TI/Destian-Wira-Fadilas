@extends('themes.ezone.layout')

@section('content')
<div class="store-area ptb-40">
    <div class="container">
    @include('admin.partials.flash')
        <h2>Buat Toko Anda</h2>
        {!! Form::model(['url' => ['shops/create']]) !!}
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Toko', 'required' => true]) !!}
				@error('name')
				<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
				</span>
				@enderror
                </div>

                <div class="form-group">
                {!! Form::textArea('description', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi', 'required' => true]) !!}
				@error('description')
				<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
				</span>
				@enderror
                </div>

                <div class="form-group">
                    <div class="checkout-form-list">
                        <label>Provinsi<span class="required">*</span></label>
                        {!! Form::select('province_id', $provinces, Auth::user()->province_id, ['id' => 'province-id', 'placeholder' => '- Pilih Provinsi - ', 'required' => true]) !!}
                    </div>
                </div>
                                        
                <div class="form-group">
                    <div class="checkout-form-list">
                        <label>Kota<span class="required">*</span></label>
                        {!! Form::select('city_id', $cities, Auth::user()->city_id, ['id' => 'city-id', 'placeholder' => '- Pilih Kota -', 'required' => true])!!}
                    </div>
                </div>
                <div class="button-box">
                    <button type="submit" class="default-btn float-right">Buat</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection