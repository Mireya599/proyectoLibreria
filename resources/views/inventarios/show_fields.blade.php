<!-- Producto Id Field -->
<div class="col-sm-12">
    {!! Form::label('producto_id', 'Producto Id:') !!}
    <p>{{ $inventario->producto_id }}</p>
</div>

<!-- Stock Field -->
<div class="col-sm-12">
    {!! Form::label('stock', 'Stock:') !!}
    <p>{{ $inventario->stock }}</p>
</div>

<!-- Stock Minimo Field -->
<div class="col-sm-12">
    {!! Form::label('stock_minimo', 'Stock Minimo:') !!}
    <p>{{ $inventario->stock_minimo }}</p>
</div>

<!-- Stock Maximo Field -->
<div class="col-sm-12">
    {!! Form::label('stock_maximo', 'Stock Maximo:') !!}
    <p>{{ $inventario->stock_maximo }}</p>
</div>

<!-- Costo Promedio Field -->
<div class="col-sm-12">
    {!! Form::label('costo_promedio', 'Costo Promedio:') !!}
    <p>{{ $inventario->costo_promedio }}</p>
</div>

<!-- Ubicacion Field -->
<div class="col-sm-12">
    {!! Form::label('ubicacion', 'Ubicacion:') !!}
    <p>{{ $inventario->ubicacion }}</p>
</div>

