<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto Id:') !!}
    {!! Form::number('producto_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Stock Minimo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_minimo', 'Stock Minimo:') !!}
    {!! Form::number('stock_minimo', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Stock Maximo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock_maximo', 'Stock Maximo:') !!}
    {!! Form::number('stock_maximo', null, ['class' => 'form-control']) !!}
</div>

<!-- Costo Promedio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('costo_promedio', 'Costo Promedio:') !!}
    {!! Form::number('costo_promedio', null, ['class' => 'form-control']) !!}
</div>

<!-- Ubicacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    {!! Form::text('ubicacion', null, ['class' => 'form-control', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>