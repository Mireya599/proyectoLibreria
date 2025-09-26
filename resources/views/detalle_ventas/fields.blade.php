<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Unitario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_unitario', 'Precio Unitario:') !!}
    {!! Form::number('precio_unitario', null, ['class' => 'form-control']) !!}
</div>

<!-- Subtotal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::number('subtotal', null, ['class' => 'form-control']) !!}
</div>

<!-- Ventas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ventas_id', 'Ventas Id:') !!}
    {!! Form::number('ventas_id', null, ['class' => 'form-control', 'required']) !!}
</div>