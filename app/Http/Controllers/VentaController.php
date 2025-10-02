<?php

namespace App\Http\Controllers;

use App\DataTables\VentaDataTable;
use App\Http\Requests\CreateVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\DB;
use App\Models\DetalleVenta;

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

        $productos = Producto::select('id','codigo','descripcion','precio_libreria','unidad_medidas_id')->get();
        $unidades  = UnidadMedida::select('id','nombre','factor')->get();

        return $ventaDataTable->render('ventas.index', compact('productos','unidades'));
    }


    /**
     * Show the form for creating a new Venta.
     */
    public function create()
    {

        $productos = Producto::select('id','codigo','descripcion','precio_libreria','unidad_medidas_id')->get();
        $unidades  = UnidadMedida::select('id','nombre','factor')->get();
        dd($productos, $unidades);
        return view('ventas.create', compact('productos','unidades'));
    }


    public function store(CreateVentaRequest $request)
    {
//        dd($request);
        DB::transaction(function() use ($request) {

            $venta = Venta::create([
                'clientes_id' => $request->input('clientes_id'),
                'total'       => $request->input('total'),
            ]);

            $productoIds   = $request->input('producto_id', []);
            $descripciones = $request->input('descripcion', []);
            $listas        = $request->input('lista_precio', []);
            $unidadesTxt   = $request->input('unidad', []);
            $unidadesId    = $request->input('unidad_id', []);
            $cantidades    = $request->input('cantidad', []);
            $precios       = $request->input('precio_unitario', []);
            $subtotales    = $request->input('subtotal', []);

            foreach ($productoIds as $i => $pid) {
                DetalleVenta::create([
                    'ventas_id'      => $venta->id,
                    'producto_id'    => $pid ?: null,
                    'descripcion'    => $descripciones[$i] ?? null,
                    'lista_precio'   => $listas[$i] ?? 'venta',
                    'unidad'         => $unidadesTxt[$i] ?? null,
                    'unidad_id'      => $unidadesId[$i] ?? null,
                    'cantidad'       => $cantidades[$i] ?? 1,
                    'precio_unitario'=> $precios[$i] ?? 0,
                    'subtotal'       => $subtotales[$i] ?? 0,
                ]);
            }
        });

        flash()->success('Venta guardada.');
        return redirect()->route('ventas.index');
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
