<?php

namespace App\DataTables;

use App\Models\DetalleVenta; // <- StudlyCase
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class DetalleVentaDataTable extends DataTable // <- StudlyCase
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
            ->addColumn('action', function (DetalleVenta $detalleVenta) {
                $id = $detalleVenta->id;
                return view('detalle_ventas.datatables_actions', compact('detalleVenta', 'id'));
            })
            ->editColumn('id', fn (DetalleVenta $detalleVenta) => $detalleVenta->id)
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DetalleVenta $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DetalleVenta $model)
    {
        return $model->newQuery()->select($model->getTable().'.*');
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
            ->info(true)
            ->language(['url' => asset('js/SpanishDataTables.json')])
            ->responsive(true)
            ->stateSave(false)
            // Ordena por la primera columna definida abajo (id)
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
                    ->addClass('')
                    ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),

                Button::make('export')
                    ->extend('collection')
                    ->addClass('')
                    ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                    ->buttons([
                        Button::make('print')->addClass('dropdown-item')->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                        Button::make('csv')->addClass('dropdown-item')->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                        Button::make('pdf')->addClass('dropdown-item')->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                        Button::make('excel')->addClass('dropdown-item')->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
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
            Column::make('id')
                ->title('ID')
                ->addClass('text-center')
                ->width('10%'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('20%')
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
        return 'detalle_ventas_datatable_' . time();
    }
}
