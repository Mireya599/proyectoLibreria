<?php

namespace App\Http\Controllers;

use App\DataTables\ProductoDataTable;
use App\Http\Requests\CreateProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Productos')->only('show');
        $this->middleware('permission:Crear Productos')->only(['create','store']);
        $this->middleware('permission:Editar Productos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Productos')->only('destroy');
    }
    /**
     * Display a listing of the Producto.
     */
    public function index(ProductoDataTable $productoDataTable)
    {
    return $productoDataTable->render('productos.index');
    }


    /**
     * Show the form for creating a new Producto.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created Producto in storage.
     */
    public function store(CreateProductoRequest $request)
    {
        $input = $request->all();

        /** @var Producto $producto */
        $producto = Producto::create($input);

        flash()->success('Producto guardado.');

        return redirect(route('productos.index'));
    }

    /**
     * Display the specified Producto.
     */
    public function show($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.show')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified Producto.
     */
    public function edit($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        return view('productos.edit')->with('producto', $producto);
    }

    /**
     * Update the specified Producto in storage.
     */
    public function update($id, UpdateProductoRequest $request)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

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
     * Remove the specified Producto from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Producto $producto */
        $producto = Producto::find($id);

        if (empty($producto)) {
            flash()->error('Producto no encontrado');

            return redirect(route('productos.index'));
        }

        $producto->delete();

        flash()->success('Producto eliminado.');

        return redirect(route('productos.index'));
    }
}
