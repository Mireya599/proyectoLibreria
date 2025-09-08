<!-- Codigo Factura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_factura', 'Codigo Factura:') !!}
    {!! Form::text('codigo_factura', null, ['class' => 'form-control', 'required', 'maxlength' => 50, 'maxlength' => 50]) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Pago Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_pago', 'Tipo Pago:') !!}
    {!! Form::text('tipo_pago', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Venta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_venta', 'Fecha Venta:') !!}
    {!! Form::text('fecha_venta', null, ['class' => 'form-control','id'=>'fecha_venta']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#fecha_venta').datepicker()
    </script>
@endpush

<!-- Clientes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('clientes_id', 'Clientes Id:') !!}
    {!! Form::number('clientes_id', null, ['class' => 'form-control', 'required']) !!}
</div>