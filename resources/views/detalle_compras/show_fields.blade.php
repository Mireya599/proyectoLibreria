<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $detalleCompra->cantidad }}</p>
</div>

<!-- Precio Unitario Field -->
<div class="col-sm-12">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    <p>{{ $detalleCompra->precio_unitario }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $detalleCompra->subtotal }}</p>
</div>

<!-- Compras Id Field -->
<div class="col-sm-12">
    {!! Form::label('compras_id', 'Compras Id:') !!}
    <p>{{ $detalleCompra->compras_id }}</p>
</div>

<!-- Productos Id Field -->
<div class="col-sm-12">
    {!! Form::label('productos_id', 'Productos Id:') !!}
    <p>{{ $detalleCompra->productos_id }}</p>
</div>

<!-- Update At Field -->
<div class="col-sm-12">
    {!! Form::label('update_at', 'Update At:') !!}
    <p>{{ $detalleCompra->update_at }}</p>
</div>

