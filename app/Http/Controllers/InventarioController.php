<?php

namespace App\Http\Controllers;

use App\DataTables\InventarioDataTable;
use App\Http\Requests\CreateInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Inventarios')->only('show');
        $this->middleware('permission:Crear Inventarios')->only(['create','store']);
        $this->middleware('permission:Editar Inventarios')->only(['edit','update']);
        $this->middleware('permission:Eliminar Inventarios')->only('destroy');
    }
    /**
     * Display a listing of the Inventario.
     */
    public function index(InventarioDataTable $inventarioDataTable)
    {
    return $inventarioDataTable->render('inventarios.index');
    }


    /**
     * Show the form for creating a new Inventario.
     */
    public function create()
    {
        return view('inventarios.create');
    }

    /**
     * Store a newly created Inventario in storage.
     */
    public function store(CreateInventarioRequest $request)
    {
        $input = $request->all();

        /** @var Inventario $inventario */
        $inventario = Inventario::create($input);

        flash()->success('Inventario guardado.');

        return redirect(route('inventarios.index'));
    }

    /**
     * Display the specified Inventario.
     */
    public function show($id)
    {
        /** @var Inventario $inventario */
        $inventario = Inventario::find($id);

        if (empty($inventario)) {
            flash()->error('Inventario no encontrado');

            return redirect(route('inventarios.index'));
        }

        return view('inventarios.show')->with('inventario', $inventario);
    }

    /**
     * Show the form for editing the specified Inventario.
     */
    public function edit($id)
    {
        /** @var Inventario $inventario */
        $inventario = Inventario::find($id);

        if (empty($inventario)) {
            flash()->error('Inventario no encontrado');

            return redirect(route('inventarios.index'));
        }

        return view('inventarios.edit')->with('inventario', $inventario);
    }

    /**
     * Update the specified Inventario in storage.
     */
    public function update($id, UpdateInventarioRequest $request)
    {
        /** @var Inventario $inventario */
        $inventario = Inventario::find($id);

        if (empty($inventario)) {
            flash()->error('Inventario no encontrado');

            return redirect(route('inventarios.index'));
        }

        $inventario->fill($request->all());
        $inventario->save();

        flash()->success('Inventario actualizado.');

        return redirect(route('inventarios.index'));
    }

    /**
     * Remove the specified Inventario from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Inventario $inventario */
        $inventario = Inventario::find($id);

        if (empty($inventario)) {
            flash()->error('Inventario no encontrado');

            return redirect(route('inventarios.index'));
        }

        $inventario->delete();

        flash()->success('Inventario eliminado.');

        return redirect(route('inventarios.index'));
    }
}
