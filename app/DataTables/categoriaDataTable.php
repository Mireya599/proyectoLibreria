<?php

namespace App\DataTables;

use App\Models\Categoria; // StudlyCase
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

class CategoriaDataTable extends DataTable // StudlyCase
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (Categoria $categoria) {
                $id = $categoria->id;
                return view('categorias.datatables_actions', compact('categoria', 'id'));
            })
            ->editColumn('id', fn (Categoria $categoria) => $categoria->id)
            ->rawColumns(['action']);
    }

    public function query(Categoria $model)
    {
        return $model->newQuery()->select($model->getTable().'.*');
    }

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
            ->orderBy(0, 'desc') // ahora la primera columna es id
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

    protected function filename(): string
    {
        return 'categorias_datatable_' . time();
    }
}
