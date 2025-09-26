<!-- Cantidad Field -->
<div class="col-sm-12">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $detalleVenta->cantidad }}</p>
</div>

<!-- Precio Unitario Field -->
<div class="col-sm-12">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    <p>{{ $detalleVenta->precio_unitario }}</p>
</div>

<!-- Subtotal Field -->
<div class="col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    <p>{{ $detalleVenta->subtotal }}</p>
</div>

<!-- Ventas Id Field -->
<div class="col-sm-12">
    {!! Form::label('ventas_id', 'Ventas Id:') !!}
    <p>{{ $detalleVenta->ventas_id }}</p>
</div>

