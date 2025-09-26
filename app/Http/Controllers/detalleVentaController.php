<?php

namespace App\Http\Controllers;

use App\DataTables\DetalleVentaDataTable;
use App\Http\Requests\CreateDetalleVentaRequest;
use App\Http\Requests\UpdateDetalleVentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Detalle Ventas')->only('show');
        $this->middleware('permission:Crear Detalle Ventas')->only(['create','store']);
        $this->middleware('permission:Editar Detalle Ventas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Detalle Ventas')->only('destroy');
    }
    /**
     * Display a listing of the DetalleVenta.
     */
    public function index(DetalleVentaDataTable $detalleVentaDataTable)
    {
    return $detalleVentaDataTable->render('detalle_ventas.index');
    }


    /**
     * Show the form for creating a new DetalleVenta.
     */
    public function create()
    {
        return view('detalle_ventas.create');
    }

    /**
     * Store a newly created DetalleVenta in storage.
     */
    public function store(CreateDetalleVentaRequest $request)
    {
        $input = $request->all();

        /** @var DetalleVenta $detalleVenta */
        $detalleVenta = DetalleVenta::create($input);

        flash()->success('Detalle Venta guardado.');

        return redirect(route('detalleVentas.index'));
    }

    /**
     * Display the specified DetalleVenta.
     */
    public function show($id)
    {
        /** @var DetalleVenta $detalleVenta */
        $detalleVenta = DetalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.show')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Show the form for editing the specified DetalleVenta.
     */
    public function edit($id)
    {
        /** @var DetalleVenta $detalleVenta */
        $detalleVenta = DetalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.edit')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Update the specified DetalleVenta in storage.
     */
    public function update($id, UpdateDetalleVentaRequest $request)
    {
        /** @var DetalleVenta $detalleVenta */
        $detalleVenta = DetalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        $detalleVenta->fill($request->all());
        $detalleVenta->save();

        flash()->success('Detalle Venta actualizado.');

        return redirect(route('detalleVentas.index'));
    }

    /**
     * Remove the specified DetalleVenta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var DetalleVenta $detalleVenta */
        $detalleVenta = DetalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        $detalleVenta->delete();

        flash()->success('Detalle Venta eliminado.');

        return redirect(route('detalleVentas.index'));
    }
}
