<!-- Codigo Factura Field -->
<div class="col-sm-12">
    {!! Form::label('codigo_factura', 'Codigo Factura:') !!}
    <p>{{ $venta->codigo_factura }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $venta->total }}</p>
</div>

<!-- Tipo Pago Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    <p>{{ $venta->tipo_pago }}</p>
</div>

<!-- Fecha Venta Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_venta', 'Fecha Venta:') !!}
    <p>{{ $venta->fecha_venta }}</p>
</div>

<!-- Clientes Id Field -->
<div class="col-sm-12">
    {!! Form::label('clientes_id', 'Clientes Id:') !!}
    <p>{{ $venta->clientes_id }}</p>
</div>

