<!-- Codigo Factura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_factura', 'Codigo Factura:') !!}
    {!! Form::text('codigo_factura', null, ['class' => 'form-control', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Fecha Compra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_compra', 'Fecha Compra:') !!}
    {!! Form::text('fecha_compra', null, ['class' => 'form-control','id'=>'fecha_compra']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_compra').datepicker()
    </script>
@endpush

<!-- Tipo Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    {!! Form::text('tipo_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>