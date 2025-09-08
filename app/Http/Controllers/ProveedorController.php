<?php

namespace App\Http\Controllers;

use App\DataTables\ProveedorDataTable;
use App\Http\Requests\CreateProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Proveedors')->only('show');
        $this->middleware('permission:Crear Proveedors')->only(['create','store']);
        $this->middleware('permission:Editar Proveedors')->only(['edit','update']);
        $this->middleware('permission:Eliminar Proveedors')->only('destroy');
    }
    /**
     * Display a listing of the Proveedor.
     */
    public function index(ProveedorDataTable $proveedorDataTable)
    {
    return $proveedorDataTable->render('proveedors.index');
    }


    /**
     * Show the form for creating a new Proveedor.
     */
    public function create()
    {
        return view('proveedors.create');
    }

    /**
     * Store a newly created Proveedor in storage.
     */
    public function store(CreateProveedorRequest $request)
    {
        $input = $request->all();

        /** @var Proveedor $proveedor */
        $proveedor = Proveedor::create($input);

        flash()->success('Proveedor guardado.');

        return redirect(route('proveedors.index'));
    }

    /**
     * Display the specified Proveedor.
     */
    public function show($id)
    {
        /** @var Proveedor $proveedor */
        $proveedor = Proveedor::find($id);

        if (empty($proveedor)) {
            flash()->error('Proveedor no encontrado');

            return redirect(route('proveedors.index'));
        }

        return view('proveedors.show')->with('proveedor', $proveedor);
    }

    /**
     * Show the form for editing the specified Proveedor.
     */
    public function edit($id)
    {
        /** @var Proveedor $proveedor */
        $proveedor = Proveedor::find($id);

        if (empty($proveedor)) {
            flash()->error('Proveedor no encontrado');

            return redirect(route('proveedors.index'));
        }

        return view('proveedors.edit')->with('proveedor', $proveedor);
    }

    /**
     * Update the specified Proveedor in storage.
     */
    public function update($id, UpdateProveedorRequest $request)
    {
        /** @var Proveedor $proveedor */
        $proveedor = Proveedor::find($id);

        if (empty($proveedor)) {
            flash()->error('Proveedor no encontrado');

            return redirect(route('proveedors.index'));
        }

        $proveedor->fill($request->all());
        $proveedor->save();

        flash()->success('Proveedor actualizado.');

        return redirect(route('proveedors.index'));
    }

    /**
     * Remove the specified Proveedor from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Proveedor $proveedor */
        $proveedor = Proveedor::find($id);

        if (empty($proveedor)) {
            flash()->error('Proveedor no encontrado');

            return redirect(route('proveedors.index'));
        }

        $proveedor->delete();

        flash()->success('Proveedor eliminado.');

        return redirect(route('proveedors.index'));
    }
}
