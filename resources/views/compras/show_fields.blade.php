<!-- Codigo Factura Field -->
<div class="col-sm-12">
    {!! Form::label('codigo_factura', 'Codigo Factura:') !!}
    <p>{{ $compra->codigo_factura }}</p>
</div>

<!-- Fecha Compra Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_compra', 'Fecha Compra:') !!}
    <p>{{ $compra->fecha_compra }}</p>
</div>

<!-- Tipo Pago Field -->
<div class="col-sm-12">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    <p>{{ $compra->tipo_pago }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $compra->total }}</p>
</div>

