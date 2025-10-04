<!-- Cantidad Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', $detalleVenta->cantidad, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<!-- Precio Unitario Field -->
<div class="form-group col-sm-12">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    {!! Form::number('precio_unitario', $detalleVenta->precio_unitario, [
        'class' => 'form-control',
        'step' => '0.01',
        'readonly' => true
    ]) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', $detalleVenta->subtotal, [
        'class' => 'form-control',
        'step' => '0.01',
        'readonly' => true
    ]) !!}
</div>

<!-- Ventas Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('ventas_id', 'Venta:') !!}
    {!! Form::number('ventas_id', $detalleVenta->ventas_id, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>
