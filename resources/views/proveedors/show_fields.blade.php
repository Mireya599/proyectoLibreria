<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $proveedor->nombre }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $proveedor->telefono }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $proveedor->direccion }}</p>
</div>

<!-- Correo Field -->
<div class="col-sm-12">
    {!! Form::label('correo', 'Correo:') !!}
    <p>{{ $proveedor->correo }}</p>
</div>

