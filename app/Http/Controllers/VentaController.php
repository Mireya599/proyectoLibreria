<?php

namespace App\Http\Controllers;

use App\DataTables\VentaDataTable;
use App\Http\Requests\CreateVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Ventas')->only('show');
        $this->middleware('permission:Crear Ventas')->only(['create','store']);
        $this->middleware('permission:Editar Ventas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Ventas')->only('destroy');
    }
    /**
     * Display a listing of the Venta.
     */
    public function index(VentaDataTable $ventaDataTable)
    {
        $productos = Producto::all();
    return $ventaDataTable->render('ventas.index', compact('productos'));
    }


    /**
     * Show the form for creating a new Venta.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created Venta in storage.
     */
    public function store(CreateVentaRequest $request)
    {
        dd($request->all());
        $input = $request->all();

        /** @var Venta $venta */
        $venta = Venta::create($input);

        flash()->success('Venta guardado.');

        return redirect(route('ventas.index'));
    }

    /**
     * Display the specified Venta.
     */
    public function show($id)
    {
        /** @var Venta $venta */
        $venta = Venta::find($id);

        if (empty($venta)) {
            flash()->error('Venta no encontrado');

            return redirect(route('ventas.index'));
        }

        return view('ventas.show')->with('venta', $venta);
    }

    /**
     * Show the form for editing the specified Venta.
     */
    public function edit($id)
    {
        /** @var Venta $venta */
        $venta = Venta::find($id);

        if (empty($venta)) {
            flash()->error('Venta no encontrado');

            return redirect(route('ventas.index'));
        }

        return view('ventas.edit')->with('venta', $venta);
    }

    /**
     * Update the specified Venta in storage.
     */
    public function update($id, UpdateVentaRequest $request)
    {
        /** @var Venta $venta */
        $venta = Venta::find($id);

        if (empty($venta)) {
            flash()->error('Venta no encontrado');

            return redirect(route('ventas.index'));
        }

        $venta->fill($request->all());
        $venta->save();

        flash()->success('Venta actualizado.');

        return redirect(route('ventas.index'));
    }

    /**
     * Remove the specified Venta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Venta $venta */
        $venta = Venta::find($id);

        if (empty($venta)) {
            flash()->error('Venta no encontrado');

            return redirect(route('ventas.index'));
        }

        $venta->delete();

        flash()->success('Venta eliminado.');

        return redirect(route('ventas.index'));
    }
}
