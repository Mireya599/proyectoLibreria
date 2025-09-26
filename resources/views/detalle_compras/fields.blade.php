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

<!-- Compras Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compras_id', 'Compras Id:') !!}
    {!! Form::number('compras_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Productos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('productos_id', 'Productos Id:') !!}
    {!! Form::number('productos_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Update At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('update_at', 'Update At:') !!}
    {!! Form::text('update_at', null, ['class' => 'form-control','id'=>'update_at']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#update_at').datepicker()
    </script>
@endpush