<?php

namespace App\Http\Controllers;

use App\DataTables\CompraDataTable;
use App\Http\Requests\CreateCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Compras')->only('show');
        $this->middleware('permission:Crear Compras')->only(['create','store']);
        $this->middleware('permission:Editar Compras')->only(['edit','update']);
        $this->middleware('permission:Eliminar Compras')->only('destroy');
    }
    /**
     * Display a listing of the Compra.
     */
    public function index(CompraDataTable $compraDataTable)
    {
    return $compraDataTable->render('compras.index');
    }


    /**
     * Show the form for creating a new Compra.
     */
    public function create()
    {
        return view('compras.create');
    }

    /**
     * Store a newly created Compra in storage.
     */
    public function store(CreateCompraRequest $request)
    {
        $input = $request->all();

        /** @var Compra $compra */
        $compra = Compra::create($input);

        flash()->success('Compra guardado.');

        return redirect(route('compras.index'));
    }

    /**
     * Display the specified Compra.
     */
    public function show($id)
    {
        /** @var Compra $compra */
        $compra = Compra::find($id);

        if (empty($compra)) {
            flash()->error('Compra no encontrado');

            return redirect(route('compras.index'));
        }

        return view('compras.show')->with('compra', $compra);
    }

    /**
     * Show the form for editing the specified Compra.
     */
    public function edit($id)
    {
        /** @var Compra $compra */
        $compra = Compra::find($id);

        if (empty($compra)) {
            flash()->error('Compra no encontrado');

            return redirect(route('compras.index'));
        }

        return view('compras.edit')->with('compra', $compra);
    }

    /**
     * Update the specified Compra in storage.
     */
    public function update($id, UpdateCompraRequest $request)
    {
        /** @var Compra $compra */
        $compra = Compra::find($id);

        if (empty($compra)) {
            flash()->error('Compra no encontrado');

            return redirect(route('compras.index'));
        }

        $compra->fill($request->all());
        $compra->save();

        flash()->success('Compra actualizado.');

        return redirect(route('compras.index'));
    }

    /**
     * Remove the specified Compra from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Compra $compra */
        $compra = Compra::find($id);

        if (empty($compra)) {
            flash()->error('Compra no encontrado');

            return redirect(route('compras.index'));
        }

        $compra->delete();

        flash()->success('Compra eliminado.');

        return redirect(route('compras.index'));
    }
}
