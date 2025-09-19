<?php

namespace App\DataTables;

use App\Models\Producto;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class ProductoDataTable extends DataTable
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

            // Mostrar nombre en lugar de id
            ->editColumn('categorias_id', fn(Producto $p) => optional($p->categorias)->nombre ?? '—')
            ->editColumn('proveedores_id', fn(Producto $p) => optional($p->proveedores)->nombre ?? '—')
            ->editColumn('unidad_medidas_id', fn(Producto $p) => optional($p->unidadMedidas)->nombre ?? '—')

            // Buscar por NOMBRE (no por id)
            ->filterColumn('categorias_id', function ($q, $kw) {
                $q->whereHas('categorias', fn($qq) => $qq->where('nombre', 'like', "%{$kw}%"));
            })
            ->filterColumn('proveedores_id', function ($q, $kw) {
                $q->whereHas('proveedores', fn($qq) => $qq->where('nombre', 'like', "%{$kw}%"));
            })
            ->filterColumn('unidad_medidas_id', function ($q, $kw) {
                $q->whereHas('unidadMedidas', fn($qq) => $qq->where('nombre', 'like', "%{$kw}%"));
            })

            ->addColumn('action', function(Producto $producto){
                $id = $producto->id;
                return view('productos.datatables_actions', compact('producto','id'));
            })
            ->rawColumns(['action']);
    }


    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Producto $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Producto $model)
    {
        return $model->newQuery()
            ->with([
                'categorias:id,nombre',
                'proveedores:id,nombre',
                'unidadMedidas:id,nombre',
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
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
                ])
                ->info(true)
                ->language(['url' => asset('js/SpanishDataTables.json')])
                ->responsive(true)
                ->stateSave(false)
                ->orderBy(1,'desc')
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
                        ->addClass('')
                        ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),

                    Button::make('export')
                        ->extend('collection')
                        ->addClass('')
                        ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                        ->buttons([
                            Button::make('print')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                            Button::make('csv')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                            Button::make('pdf')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                            Button::make('excel')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
                        ]),
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
            Column::make('codigo')->title('Codigo'),
            Column::make('descripcion')->title('Descripcion'),
            Column::make('cantidad')->title('Cantidad'),
            Column::make('precio_fabrica')->title('Precio Fabrica'),
            Column::make('total_fabrica')->title('Total Fabrica'),
            Column::make('precio_libreria')->title('Precio Libreria'),
            Column::make('total_libreria')->title('Total Libreria'),
            Column::make('ganancia')->title('Ganancia'),

            // Mantenemos la key original pero mostramos nombre (via editColumn)
            Column::make('categorias_id')->title('Categoría')->orderable(false),
            Column::make('proveedores_id')->title('Proveedor')->orderable(false),
            Column::make('unidad_medidas_id')->title('Unidad Medida')->orderable(false),

            Column::computed('action')
                ->exportable(false)->printable(false)
                ->width('20%')->addClass('text-center'),
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'productos_datatable_' . time();
    }
}
