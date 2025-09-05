<?php

namespace App\Http\Controllers;

use App\DataTables\productoDataTable;
use App\Http\Requests\CreateproductoRequest;
use App\Http\Requests\UpdateproductoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\producto;
use Illuminate\Http\Request;

class productoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Productos')->only('show');
        $this->middleware('permission:Crear Productos')->only(['create','store']);
        $this->middleware('permission:Editar Productos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Productos')->only('destroy');
    }
    /**
     * Display a listing of the producto.
     */
    public function index(productoDataTable $productoDataTable)
    {
    return $productoDataTable->render('productos.index');
    }


    /**
     * Show the form for creating a new producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created producto in storage.
     */
    public function store(CreateproductoRequest $request)
    {
        $input = $request->all();

        /** @var producto $producto */
        $producto = producto::create($input);

        flash()->success('Producto guardado.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified producto.
     */
    public function show($id)
    {
        /** @var producto $producto */
        $producto = producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified producto.
     */
    public function edit($id)
    {
        /** @var producto $producto */
        $producto = producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('producto', $producto);
    }

    /**
     * Update the specified producto in storage.
     */
    public function update($id, UpdateproductoRequest $request)
    {
        /** @var producto $producto */
        $producto = producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        $producto->fill($request->all());
        $producto->save();

        flash()->success('Producto actualizado.');

        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified producto from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var producto $producto */
        $producto = producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        $producto->delete();

        flash()->success('Producto eliminado.');

        return redirect(route('productos.index'));
    }
}
