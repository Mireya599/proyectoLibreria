<?php

namespace App\Http\Controllers;

use App\DataTables\detalleVentaDataTable;
use App\Http\Requests\CreatedetalleVentaRequest;
use App\Http\Requests\UpdatedetalleVentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\detalleVenta;
use Illuminate\Http\Request;

class detalleVentaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Detalle Ventas')->only('show');
        $this->middleware('permission:Crear Detalle Ventas')->only(['create','store']);
        $this->middleware('permission:Editar Detalle Ventas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Detalle Ventas')->only('destroy');
    }
    /**
     * Display a listing of the detalleVenta.
     */
    public function index(detalleVentaDataTable $detalleVentaDataTable)
    {
    return $detalleVentaDataTable->render('detalle_ventas.index');
    }


    /**
     * Show the form for creating a new detalleVenta.
     */
    public function create()
    {
        return view('detalle_ventas.create');
    }

    /**
     * Store a newly created detalleVenta in storage.
     */
    public function store(CreatedetalleVentaRequest $request)
    {
        $input = $request->all();

        /** @var detalleVenta $detalleVenta */
        $detalleVenta = detalleVenta::create($input);

        flash()->success('Detalle Venta guardado.');

        return redirect(route('detalleVentas.index'));
    }

    /**
     * Display the specified detalleVenta.
     */
    public function show($id)
    {
        /** @var detalleVenta $detalleVenta */
        $detalleVenta = detalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.show')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Show the form for editing the specified detalleVenta.
     */
    public function edit($id)
    {
        /** @var detalleVenta $detalleVenta */
        $detalleVenta = detalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        return view('detalle_ventas.edit')->with('detalleVenta', $detalleVenta);
    }

    /**
     * Update the specified detalleVenta in storage.
     */
    public function update($id, UpdatedetalleVentaRequest $request)
    {
        /** @var detalleVenta $detalleVenta */
        $detalleVenta = detalleVenta::find($id);

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
     * Remove the specified detalleVenta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var detalleVenta $detalleVenta */
        $detalleVenta = detalleVenta::find($id);

        if (empty($detalleVenta)) {
            flash()->error('Detalle Venta no encontrado');

            return redirect(route('detalleVentas.index'));
        }

        $detalleVenta->delete();

        flash()->success('Detalle Venta eliminado.');

        return redirect(route('detalleVentas.index'));
    }
}
