<?php

namespace App\DataTables;

use App\Models\DetalleVenta;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;

class DetalleVentaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)

            // Columna compuesta: nombre/código del producto
            ->addColumn('producto', function (DetalleVenta $d) {
                // Asume relación producto()->belongsTo(Producto::class)
                $codigo = $d->producto->codigo ?? null;
                $desc   = $d->producto->descripcion ?? $d->descripcion ?? '—';
                return $codigo ? ($codigo.' - '.$desc) : $desc;
            })

            // Formato moneda server-side
            ->editColumn('precio_unitario', fn(DetalleVenta $d) =>
            number_format((float) $d->precio_unitario, 2, '.', ',')
            )
            ->editColumn('subtotal', fn(DetalleVenta $d) =>
            number_format((float) $d->subtotal, 2, '.', ',')
            )

            // (Opcional) Mostrar # de venta como link si tienes ruta show
            ->addColumn('venta', function (DetalleVenta $d) {
                $id = $d->venta->id ?? $d->venta_id;
                // return '<a href="'.route('ventas.show', $id).'">#'.$id.'</a>';
                return '#'.$id;
            })

            // Acciones
            ->addColumn('action', function(DetalleVenta $detalleVenta){
                $id = $detalleVenta->id;
                return view('detalle_ventas.datatables_actions', compact('detalleVenta','id'));
            })

            // Filtro por producto (busca en descripcion/codigo de productos)
            ->filterColumn('producto', function (Builder $q, $kw) {
                $kw = trim($kw);
                $q->where(function($qq) use ($kw) {
                    $qq->where('productos.descripcion', 'LIKE', "%{$kw}%")
                        ->orWhere('productos.codigo', 'LIKE', "%{$kw}%");
                });
            })

            ->rawColumns(['action'/*, 'venta'*/]); // descomenta 'venta' si devuelves <a>
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DetalleVenta $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DetalleVenta $model)
    {
        // Traer relaciones para no disparar N+1
        // Y unir productos para poder filtrar/ordenar por su texto
        $tbl = $model->getTable(); // 'detalle_ventas'

        return $model->newQuery()
            ->with(['producto:id,codigo,descripcion', 'venta:id'])
            ->leftJoin('productos', 'productos.id', '=', "{$tbl}.producto_id")
            ->select([
                "{$tbl}.*",
                // Aliases para poder ordenar/filtrar
                'productos.descripcion as producto_descripcion',
                'productos.codigo as producto_codigo',
            ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data); }"
            ])
            ->language(['url' => asset('js/SpanishDataTables.json')])
            ->responsive(true)
            ->stateSave(false)
            // Ordenar por ID desc (columna 0 en getColumns)
            ->orderBy(0, 'desc')
            ->dom('
                <"row mb-2"
                    <"col-sm-12 col-md-6" B>
                    <"col-sm-12 col-md-6" f>
                >
                rt
                <"row"
                    <"col-sm-6 order-2 order-sm-1" ip>
                    <"col-sm-6 order-1 order-sm-2 text-right" l>
                >
            ')
            ->buttons(
                Button::make('reset')
                    ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),
                Button::make('export')
                    ->extend('collection')
                    ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                    ->buttons([
                        Button::make('print')->addClass('dropdown-item')
                            ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                        Button::make('csv')->addClass('dropdown-item')
                            ->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                        Button::make('pdf')->addClass('dropdown-item')
                            ->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                        Button::make('excel')->addClass('dropdown-item')
                            ->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
                    ])
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Muestra el ID y permite ordenar por él
            Column::make('id')->title('#')->width('60px'),

            // Producto (derivado, viene del addColumn('producto'))
            Column::computed('producto')
                ->title('Producto')
                ->orderable(true)     // ordenar usando: orderColumn más abajo
                ->searchable(true),

            // Unidad
            Column::make('unidad')->title('Unidad')->className('text-center'),

            // Lista de precio
            Column::make('lista_precio')->title('Lista')->className('text-center'),

            // Cantidad
            Column::make('cantidad')->title('Cant.')->className('text-center'),

            // Precios y subtotal (mostramos como número, formateado server-side)
            Column::make('precio_unitario')->title('Precio')->className('text-right'),
            Column::make('subtotal')->title('Subtotal')->className('text-right'),

            // Venta (id) – derivado, por eso computed
            Column::computed('venta')->title('Venta')->className('text-center'),

            // Acciones
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('120px')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'detalle_ventas_' . time();
    }
}
