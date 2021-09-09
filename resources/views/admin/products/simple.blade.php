<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('price', 'Harga') !!}
            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('weight', 'Berat (Gram)') !!}
            {!! Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Berat']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('stock', 'Stok') !!}
            {!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'Stok']) !!}
        </div>
    </div>
</div>