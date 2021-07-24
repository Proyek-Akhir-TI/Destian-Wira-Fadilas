<p class="text-primary mt-4">Variasi Produk</p>
<hr/>
 @foreach ($product->variants as $variant)
 {!! Form::hidden('variants['. $variant->id .'][id]', $variant->id) !!}
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('sku', 'SKU') !!}
                {!! Form::text('variants['. $variant->id .'][sku]', $variant->sku, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('name', 'Nama') !!}
                {!! Form::text('variants['. $variant->id .'][name]', $variant->name, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('price', 'Harga') !!}
                {!! Form::text('variants['. $variant->id .'][price]', $variant->price, ['class' => 'form-control', 'required' => true]) !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('stock', 'Stok') !!}
                {!! Form::text('variants['. $variant->id .'][stock]', ($variant->productInventory) ? $variant->productInventory->stock : null, ['class' => 'form-control', 'required' => true]) !!}
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('weight', 'Berat') !!}
                {!! Form::text('variants['. $variant->id .'][weight]', $variant->weight, ['class' => 'form-control', 'required' => true]) !!}
            </div>
        </div>
    </div>
@endforeach
<hr/>