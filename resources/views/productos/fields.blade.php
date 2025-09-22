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
    <input class="form-control" v-model="cantidad">
</div>

<!-- Precio Fabrica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_fabrica', 'Precio Fabrica:') !!}
    <input class="form-control" v-model="precioFabrica">

</div>

<!-- Total Fabrica Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_fabrica', 'Total Fabrica:') !!}
    <input class="form-control" v-model="totalFabrica" disabled>
</div>

<!-- Precio Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio_libreria', 'Precio Libreria:') !!}
    <input class="form-control" v-model="precioLibreria">
</div>

<!-- Total Libreria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_libreria', 'Total Libreria:') !!}
    <input class="form-control" v-model="totalLibreria" disabled>
</div>

<!-- Ganancia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ganancia', 'Ganancia:') !!}
    <input class="form-control" v-model="ganancia" disabled>
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


@push('scripts')
    <script>
        new Vue ({
            el: '#vueProducto',
            data:{
                precioFabrica: 0,
                cantidad: 0,
                precioLibreria: 0,
            },
            computed: {
                totalFabrica(){
                    return this.precioFabrica * this.cantidad
                },
                totalLibreria(){
                    return this.precioLibreria * this.cantidad
                },
                ganancia(){
                    return this.totalLibreria - this.totalFabrica
                }
            }
        })
    </script>
@endpush
