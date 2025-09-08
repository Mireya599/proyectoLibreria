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
    {!! Form::number('precio_fabrica', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Fabrica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_fabrica', 'Total Fabrica:') !!}
    {!! Form::number('total_fabrica', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_libreria', 'Precio Libreria:') !!}
    {!! Form::number('precio_libreria', null, ['class' => 'form-control']) !!}
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
    {!! Form::label('categorias_id', 'Categorias Id:') !!}
    {!! Form::number('categorias_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Proveedores Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proveedores_id', 'Proveedores Id:') !!}
    {!! Form::number('proveedores_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Unidad Medidas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unidad_medidas_id', 'Unidad Medidas Id:') !!}
    {!! Form::number('unidad_medidas_id', null, ['class' => 'form-control', 'required']) !!}
</div>