<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Código:') !!}
    {!! Form::text('codigo', $producto->codigo, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::text('descripcion', $producto->descripcion, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', $producto->cantidad, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('precio_fabrica', 'Precio Fábrica:') !!}
    {!! Form::number('precio_fabrica', $producto->precio_fabrica, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

{{-- Relacionales --}}
<div class="form-group col-sm-6">
    {!! Form::label('categorias_id', 'Categoría') !!}
    {!! Form::select('categorias_id', $categorias, $producto->categorias_id, [
        'class' => 'form-control select2',
        'disabled' => true
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('proveedores_id', 'Proveedor') !!}
    {!! Form::select('proveedores_id', $proveedores, $producto->proveedores_id, [
        'class' => 'form-control select2',
        'disabled' => true
    ]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('unidad_medida_id', 'Unidad de Medida') !!}
    {!! Form::select('unidad_medida_id', $unidades, $producto->unidad_medida_id, [
        'class' => 'form-control select2',
        'disabled' => true
    ]) !!}
</div>
