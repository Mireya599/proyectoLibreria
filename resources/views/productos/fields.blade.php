<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control', 'required', 'maxlength' => 100, 'maxlength' => 100]) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Fabrica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_fabrica', 'Precio Fabrica:') !!}
    {!! Form::number('precio_fabrica', old('precio_fabrica', optional($producto)->precio_fabrica), ['class' => 'form-control',
    'id'    => 'precio_fabrica','min'   => 0, 'step'  => '0.01',
]) !!}

</div>

<!-- Total Fabrica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_fabrica', 'Total Fabrica:') !!}
    {!! Form::number('total_fabrica', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_libreria', 'Precio Libreria:') !!}
    {!! Form::number('precio_libreria', old('precio_libreria', optional($producto)->precio_libreria), [
    'class' => 'form-control',
    'id'    => 'precio_libreria',
    'min'   => 0,
    'step'  => '0.01',   // <-- importante
]) !!}
</div>

<!-- Total Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_libreria', 'Total Libreria:') !!}
    {!! Form::number('total_libreria', null, ['class' => 'form-control']) !!}
</div>

<!-- Ganancia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ganancia', 'Ganancia:') !!}
    {!! Form::number('ganancia', null, ['class' => 'form-control']) !!}
</div>
<!-- Categorias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorias_id', 'Categoría') !!}
    {!! Form::select('categorias_id', $categorias, $producto->categorias_id, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione una categoría'
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('proveedores_id', 'Proveedor') !!}
    {!! Form::select('proveedores_id', $proveedores, $producto->proveedores_id, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione un proveedor'
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('unidad_medidas_id', 'Unidad de Medida') !!}
    {!! Form::select('unidad_medidas_id', $unidades, $producto->unidad_medidas_id, [
        'class' => 'form-control select2',
        'placeholder' => 'Seleccione una unidad'
    ]) !!}
</div>
