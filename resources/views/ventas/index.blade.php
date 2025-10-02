@extends('layouts.app')

@section('titulo_pagina', 'Nueva Venta')

@section('content')
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h1 class="mb-1">Nueva Venta</h1>
                </div>
{{--                <div class="btn-toolbar" role="toolbar">--}}
{{--                    <div class="btn-group mr-2">--}}
{{--                        <a href="{{ route('ventas.index') }}" class="btn btn-outline-secondary">--}}
{{--                            <i class="fas fa-arrow-left mr-1"></i> Volver--}}
{{--                        </a>--}}
{{--                        <a href="{{ route('ventas.create') }}" class="btn btn-outline-primary">--}}
{{--                            <i class="fas fa-plus mr-1"></i> Nueva--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <section class="content mt-12">
        <div class="container-fluid">
            <div id="venta">
                <form action="{{ route('ventas.store') }}" method="POST" id="form-venta">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card border">
                                <div class="card-header bg-white py-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="card-title mb-0">
                                            <i class="fas fa-box-open mr-2 text-primary"></i> Productos
                                        </h3>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-7 mb-2">
                                            <label class="mb-1">Buscar producto</label>
                                            <div class="input-group">
                                                <select id="producto_id" class="form-control" style="width:100%"
                                                        v-model="productoSeleccionadoId">
                                                    <option value="">-- Selecciona --</option>
                                                    <option v-for="p in productos" :key="p.id" :value="p.id">
                                                        @{{ p.codigo ? (p.codigo + ' - ') : '' }}@{{ p.descripcion }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <label class="mb-1">Unidad de medida</label>
                                            <select class="form-control" id="unidad_select" v-model="unidadSeleccionadaId">
                                                <option value="">-- Selecciona --</option>
                                                <option v-for="u in unidades" :key="u.id" :value="u.id">
                                                    @{{ u.nombre }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 col-6 mb-2">
                                            <label class="mb-1">Cantidad</label>
                                            <input type="number" min="1" class="form-control" id="cantidad_input"
                                                   v-model.number="cantidad">
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <label class="mb-1">Lista de precio</label>
                                            <select class="form-control" id="precio_select" v-model="listaPrecio">
                                                <option value="venta">Precio venta</option>
                                                <option value="mayorista">Mayorista</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-success" id="btn_agregar" @click="agregar">
                                            <i class="fas fa-cart-plus mr-1"></i> Agregar producto
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- Detalle --}}
                            <div class="card border mt-3">
                                <div class="card-header bg-white py-2">
                                <span class="font-weight-semibold">
                                    <i class="fas fa-list mr-2 text-primary"></i>Detalle de la venta
                                </span>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table mb-0" id="tabla-detalle">
                                            <thead class="thead-light">
                                            <tr class="text-muted">
                                                <th style="width: 40%">Producto</th>
                                                <th class="text-center">Unidad</th>
                                                <th class="text-right">Precio</th>
                                                <th class="text-center">Cant.</th>
                                                <th class="text-right">Subtotal</th>
                                                <th class="text-center" style="width: 50px;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-if="items.length === 0" id="fila-vacia">
                                                <td colspan="6" class="text-center text-muted py-4">
                                                    <i class="far fa-file mr-1"></i> Aún no agregas productos
                                                </td>
                                            </tr>
                                            <tr v-for="(it, idx) in items" :key="idx">
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="font-weight-semibold">
                                                            @{{ it.codigo ? (it.codigo + ' - ') : '' }}@{{ it.descripcion }}
                                                        </span>

                                                        <input type="hidden" name="producto_id[]"  :value="it.id">
                                                        <input type="hidden" name="descripcion[]"  :value="it.descripcion"><!-- NUEVO -->
                                                        <input type="hidden" name="lista_precio[]" :value="it.lista">
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    @{{ it.unidad }}
                                                    <input type="hidden" name="unidad[]"     :value="it.unidad">
                                                    <input type="hidden" name="unidad_id[]"  :value="it.unidad_id">
                                                </td>

                                                <td class="text-right">
                                                    @{{ formatoQ(it.precio) }}
                                                    <input type="hidden" name="precio_unitario[]" :value="it.precio">
                                                </td>

                                                <td class="text-center">
                                                    <input type="number" min="1" class="form-control form-control-sm"
                                                           style="max-width:90px;margin:0 auto"
                                                           v-model.number="it.cantidad" @input="recalcular(idx)">
                                                    <input type="hidden" name="cantidad[]" :value="it.cantidad">
                                                </td>

                                                <td class="text-right">
                                                    @{{ formatoQ(it.subtotal) }}
                                                    <input type="hidden" name="subtotal[]" :value="it.subtotal">
                                                </td>

                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                            @click="quitar(idx)" title="Quitar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right text-muted">Total</td>
                                                <td class="text-right font-weight-bold" id="total_tabla">@{{ formatoQ(total) }}</td>
                                                <td></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="total" :value="total">
                            <input type="hidden" name="clientes_id" value="1">

                            <div class="mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" :disabled="items.length === 0">
                                    <i class="fas fa-save mr-1"></i> Guardar venta
                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

@push('styles')
    <style>
        .font-weight-semibold{ font-weight:600; }
        .position-xl-sticky{ position: static; }
        @media (min-width: 1200px){
            .position-xl-sticky{ position: sticky; }
        }
    </style>
@endpush

@push('scripts')
    {{-- Vue 2 (CDN) --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#venta',
            data: {
                // del backend
                productos: @json($productos ?? []),
                unidades:  @json($unidades  ?? []),

                // selección en cabecera
                productoSeleccionadoId: '',
                unidadSeleccionadaId: '',  // NUEVO
                cantidad: 1,
                listaPrecio: 'venta',

                items: []
            },
            computed: {
                total(){
                    return this.items.reduce((acc, it) => acc + Number(it.subtotal || 0), 0);
                }
            },
            methods: {
                formatoQ(n){
                    return new Intl.NumberFormat('es-GT', { style: 'currency', currency: 'GTQ' }).format(Number(n||0));
                },
                precioDeLista(p){
                    if(!p) return 0;
                    const precioVenta     = Number(p.precio_libreria || 0);
                    const precioMayorista = Number(p.precio_mayorista || precioVenta);
                    return this.listaPrecio === 'mayorista' ? precioMayorista : precioVenta;
                },
                unidadLabelPorId(id){
                    const u = this.unidades.find(x => String(x.id) === String(id));
                    if(!u) return 'UND';
                    return (u.nombre);
                },
                factorPorId(id){
                    const u = this.unidades.find(x => String(x.id) === String(id));
                    return u && Number(u.factor) > 0 ? Number(u.factor) : 1;
                },

                agregar(){
                    if(!this.productoSeleccionadoId){ alert('Selecciona un producto'); return; }
                    if(!this.cantidad || this.cantidad < 1){ alert('Ingresa una cantidad válida'); return; }

                    const p = this.productos.find(x => String(x.id) === String(this.productoSeleccionadoId));

                    // 1) Precio base según la lista (venta/mayorista)
                    const precioBase = Number(this.precioDeLista(p) || 0);

                    // 2) Unidad base (del producto) y unidad seleccionada en el formulario
                    const unidadBaseId = p?.unidad_medidas_id ?? null;
                    const unidadSelId  = this.unidadSeleccionadaId || unidadBaseId;

                    // 3) Factores
                    const factorBase = this.factorPorId(unidadBaseId); // p.ej. Resma=500
                    const factorSel  = this.factorPorId(unidadSelId);  // p.ej. Unidad_Papel=1, Caja x12=12

                    // 4) Conversión de precio: base -> seleccionada
                    const precioConv = Number((precioBase * (factorSel / factorBase)).toFixed(2));

                    // 5) Resto de datos
                    const cant      = Number(this.cantidad || 1);
                    const unidadTxt = this.unidadLabelPorId(unidadSelId);

                    const item = {
                        id: p.id,
                        codigo: p.codigo || '',
                        descripcion: p.descripcion || '',
                        unidad: unidadTxt,
                        unidad_id: unidadSelId,
                        lista: this.listaPrecio,
                        precio: precioConv,
                        cantidad: cant,
                        subtotal: Number((precioConv * cant).toFixed(2))
                    };

                    this.items.push(item);

                    // reset (si quieres conservar la unidad, no la borres)
                    this.productoSeleccionadoId = '';
                    this.unidadSeleccionadaId   = '';
                    this.cantidad = 1;
                },

                recalcular(idx){
                    const it = this.items[idx];
                    it.subtotal = Number((Number(it.precio) * Number(it.cantidad || 1)).toFixed(2));
                },
                quitar(idx){
                    this.items.splice(idx, 1);
                }
            }
        });
    </script>
@endpush
