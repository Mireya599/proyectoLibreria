<?php

namespace App\Http\Controllers;

use App\DataTables\DetalleCompraDataTable;
use App\Http\Requests\CreateDetalleCompraRequest;
use App\Http\Requests\UpdateDetalleCompraRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;

class DetalleCompraController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Detalle Compras')->only('show');
        $this->middleware('permission:Crear Detalle Compras')->only(['create','store']);
        $this->middleware('permission:Editar Detalle Compras')->only(['edit','update']);
        $this->middleware('permission:Eliminar Detalle Compras')->only('destroy');
    }
    /**
     * Display a listing of the DetalleCompra.
     */
    public function index(DetalleCompraDataTable $detalleCompraDataTable)
    {
    return $detalleCompraDataTable->render('detalle_compras.index');
    }


    /**
     * Show the form for creating a new DetalleCompra.
     */
    public function create()
    {
        return view('detalle_compras.create');
    }

    /**
     * Store a newly created DetalleCompra in storage.
     */
    public function store(CreateDetalleCompraRequest $request)
    {
        $input = $request->all();

        /** @var DetalleCompra $detalleCompra */
        $detalleCompra = DetalleCompra::create($input);

        flash()->success('Detalle Compra guardado.');

        return redirect(route('detalleCompras.index'));
    }

    /**
     * Display the specified DetalleCompra.
     */
    public function show($id)
    {
        /** @var DetalleCompra $detalleCompra */
        $detalleCompra = DetalleCompra::find($id);

        if (empty($detalleCompra)) {
            flash()->error('Detalle Compra no encontrado');

            return redirect(route('detalleCompras.index'));
        }

        return view('detalle_compras.show')->with('detalleCompra', $detalleCompra);
    }

    /**
     * Show the form for editing the specified DetalleCompra.
     */
    public function edit($id)
    {
        /** @var DetalleCompra $detalleCompra */
        $detalleCompra = DetalleCompra::find($id);

        if (empty($detalleCompra)) {
            flash()->error('Detalle Compra no encontrado');

            return redirect(route('detalleCompras.index'));
        }

        return view('detalle_compras.edit')->with('detalleCompra', $detalleCompra);
    }

    /**
     * Update the specified DetalleCompra in storage.
     */
    public function update($id, UpdateDetalleCompraRequest $request)
    {
        /** @var DetalleCompra $detalleCompra */
        $detalleCompra = DetalleCompra::find($id);

        if (empty($detalleCompra)) {
            flash()->error('Detalle Compra no encontrado');

            return redirect(route('detalleCompras.index'));
        }

        $detalleCompra->fill($request->all());
        $detalleCompra->save();

        flash()->success('Detalle Compra actualizado.');

        return redirect(route('detalleCompras.index'));
    }

    /**
     * Remove the specified DetalleCompra from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var DetalleCompra $detalleCompra */
        $detalleCompra = DetalleCompra::find($id);

        if (empty($detalleCompra)) {
            flash()->error('Detalle Compra no encontrado');

            return redirect(route('detalleCompras.index'));
        }

        $detalleCompra->delete();

        flash()->success('Detalle Compra eliminado.');

        return redirect(route('detalleCompras.index'));
    }
}
