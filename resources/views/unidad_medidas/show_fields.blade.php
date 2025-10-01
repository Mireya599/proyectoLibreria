<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $unidadMedida->nombre }}</p>
</div>

<!-- Categoria Field -->
<div class="col-sm-12">
    {!! Form::label('categoria', 'Categoria:') !!}
    <p>{{ $unidadMedida->categoria }}</p>
</div>

<!-- Unidad Comercial Field -->
<div class="col-sm-12">
    {!! Form::label('unidad_comercial', 'Unidad Comercial:') !!}
    <p>{{ $unidadMedida->unidad_comercial }}</p>
</div>

<!-- Equivalencia Field -->
<div class="col-sm-12">
    {!! Form::label('equivalencia', 'Equivalencia:') !!}
    <p>{{ $unidadMedida->equivalencia }}</p>
</div>

