<?php

namespace App\Http\Controllers;

use App\DataTables\ProovedorDataTable;
use App\Http\Requests\CreateProovedorRequest;
use App\Http\Requests\UpdateProovedorRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Proovedor;
use Illuminate\Http\Request;

class ProovedorController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Proovedors')->only('show');
        $this->middleware('permission:Crear Proovedors')->only(['create','store']);
        $this->middleware('permission:Editar Proovedors')->only(['edit','update']);
        $this->middleware('permission:Eliminar Proovedors')->only('destroy');
    }
    /**
     * Display a listing of the Proovedor.
     */
    public function index(ProovedorDataTable $proovedorDataTable)
    {
    return $proovedorDataTable->render('proovedors.index');
    }


    /**
     * Show the form for creating a new Proovedor.
     */
    public function create()
    {
        return view('proovedors.create');
    }

    /**
     * Store a newly created Proovedor in storage.
     */
    public function store(CreateProovedorRequest $request)
    {
        $input = $request->all();

        /** @var Proovedor $proovedor */
        $proovedor = Proovedor::create($input);

        flash()->success('Proovedor guardado.');

        return redirect(route('proovedors.index'));
    }

    /**
     * Display the specified Proovedor.
     */
    public function show($id)
    {
        /** @var Proovedor $proovedor */
        $proovedor = Proovedor::find($id);

        if (empty($proovedor)) {
            flash()->error('Proovedor no encontrado');

            return redirect(route('proovedors.index'));
        }

        return view('proovedors.show')->with('proovedor', $proovedor);
    }

    /**
     * Show the form for editing the specified Proovedor.
     */
    public function edit($id)
    {
        /** @var Proovedor $proovedor */
        $proovedor = Proovedor::find($id);

        if (empty($proovedor)) {
            flash()->error('Proovedor no encontrado');

            return redirect(route('proovedors.index'));
        }

        return view('proovedors.edit')->with('proovedor', $proovedor);
    }

    /**
     * Update the specified Proovedor in storage.
     */
    public function update($id, UpdateProovedorRequest $request)
    {
        /** @var Proovedor $proovedor */
        $proovedor = Proovedor::find($id);

        if (empty($proovedor)) {
            flash()->error('Proovedor no encontrado');

            return redirect(route('proovedors.index'));
        }

        $proovedor->fill($request->all());
        $proovedor->save();

        flash()->success('Proovedor actualizado.');

        return redirect(route('proovedors.index'));
    }

    /**
     * Remove the specified Proovedor from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Proovedor $proovedor */
        $proovedor = Proovedor::find($id);

        if (empty($proovedor)) {
            flash()->error('Proovedor no encontrado');

            return redirect(route('proovedors.index'));
        }

        $proovedor->delete();

        flash()->success('Proovedor eliminado.');

        return redirect(route('proovedors.index'));
    }
}
