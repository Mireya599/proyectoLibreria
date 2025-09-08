<?php

namespace App\Http\Controllers;

use App\DataTables\UnidadMedidaDataTable;
use App\Http\Requests\CreateUnidadMedidaRequest;
use App\Http\Requests\UpdateUnidadMedidaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Unidad Medidas')->only('show');
        $this->middleware('permission:Crear Unidad Medidas')->only(['create','store']);
        $this->middleware('permission:Editar Unidad Medidas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Unidad Medidas')->only('destroy');
    }
    /**
     * Display a listing of the UnidadMedida.
     */
    public function index(UnidadMedidaDataTable $unidadMedidaDataTable)
    {
    return $unidadMedidaDataTable->render('unidad_medidas.index');
    }


    /**
     * Show the form for creating a new UnidadMedida.
     */
    public function create()
    {
        return view('unidad_medidas.create');
    }

    /**
     * Store a newly created UnidadMedida in storage.
     */
    public function store(CreateUnidadMedidaRequest $request)
    {
        $input = $request->all();

        /** @var UnidadMedida $unidadMedida */
        $unidadMedida = UnidadMedida::create($input);

        flash()->success('Unidad Medida guardado.');

        return redirect(route('unidadMedidas.index'));
    }

    /**
     * Display the specified UnidadMedida.
     */
    public function show($id)
    {
        /** @var UnidadMedida $unidadMedida */
        $unidadMedida = UnidadMedida::find($id);

        if (empty($unidadMedida)) {
            flash()->error('Unidad Medida no encontrado');

            return redirect(route('unidadMedidas.index'));
        }

        return view('unidad_medidas.show')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Show the form for editing the specified UnidadMedida.
     */
    public function edit($id)
    {
        /** @var UnidadMedida $unidadMedida */
        $unidadMedida = UnidadMedida::find($id);

        if (empty($unidadMedida)) {
            flash()->error('Unidad Medida no encontrado');

            return redirect(route('unidadMedidas.index'));
        }

        return view('unidad_medidas.edit')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Update the specified UnidadMedida in storage.
     */
    public function update($id, UpdateUnidadMedidaRequest $request)
    {
        /** @var UnidadMedida $unidadMedida */
        $unidadMedida = UnidadMedida::find($id);

        if (empty($unidadMedida)) {
            flash()->error('Unidad Medida no encontrado');

            return redirect(route('unidadMedidas.index'));
        }

        $unidadMedida->fill($request->all());
        $unidadMedida->save();

        flash()->success('Unidad Medida actualizado.');

        return redirect(route('unidadMedidas.index'));
    }

    /**
     * Remove the specified UnidadMedida from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var UnidadMedida $unidadMedida */
        $unidadMedida = UnidadMedida::find($id);

        if (empty($unidadMedida)) {
            flash()->error('Unidad Medida no encontrado');

            return redirect(route('unidadMedidas.index'));
        }

        $unidadMedida->delete();

        flash()->success('Unidad Medida eliminado.');

        return redirect(route('unidadMedidas.index'));
    }
}
