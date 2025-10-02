<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'maxlength' => 45, 'maxlength' => 45]) !!}
</div>

<!-- Categoria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria', 'Categoria:') !!}
    {!! Form::text('categoria', null, ['class' => 'form-control', 'maxlength' => 60, 'maxlength' => 60]) !!}
</div>

<!-- Unidad Comercial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unidad_comercial', 'Unidad Comercial:') !!}
    {!! Form::text('unidad_comercial', null, ['class' => 'form-control', 'maxlength' => 120, 'maxlength' => 120]) !!}
</div>

<!-- Equivalencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equivalencia', 'Equivalencia:') !!}
    {!! Form::text('equivalencia', null, ['class' => 'form-control', 'maxlength' => 120, 'maxlength' => 120]) !!}
</div>

<!-- Factor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('factor', 'Factor:') !!}
    {!! Form::number('factor', null, ['class' => 'form-control', 'required']) !!}
</div>