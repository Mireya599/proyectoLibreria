<!-- Nombre Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', $cliente->nombre, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-12">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', $cliente->telefono, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', $cliente->direccion, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('correo', 'Correo:') !!}
    {!! Form::email('correo', $cliente->correo, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>

<!-- Nit Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nit', 'NIT:') !!}
    {!! Form::text('nit', $cliente->nit, [
        'class' => 'form-control',
        'readonly' => true
    ]) !!}
</div>
