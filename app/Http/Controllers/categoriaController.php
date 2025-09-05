<?php

namespace App\Http\Controllers;

use App\DataTables\categoriaDataTable;
use App\Http\Requests\CreatecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\categoria;
use Illuminate\Http\Request;

class categoriaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Categorias')->only('show');
        $this->middleware('permission:Crear Categorias')->only(['create','store']);
        $this->middleware('permission:Editar Categorias')->only(['edit','update']);
        $this->middleware('permission:Eliminar Categorias')->only('destroy');
    }
    /**
     * Display a listing of the categoria.
     */
    public function index(categoriaDataTable $categoriaDataTable)
    {
    return $categoriaDataTable->render('categorias.index');
    }


    /**
     * Show the form for creating a new categoria.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created categoria in storage.
     */
    public function store(CreatecategoriaRequest $request)
    {
        $input = $request->all();

        /** @var categoria $categoria */
        $categoria = categoria::create($input);

        flash()->success('Categoria guardado.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified categoria.
     */
    public function show($id)
    {
        /** @var categoria $categoria */
        $categoria = categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified categoria.
     */
    public function edit($id)
    {
        /** @var categoria $categoria */
        $categoria = categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified categoria in storage.
     */
    public function update($id, UpdatecategoriaRequest $request)
    {
        /** @var categoria $categoria */
        $categoria = categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        $categoria->fill($request->all());
        $categoria->save();

        flash()->success('Categoria actualizado.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified categoria from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var categoria $categoria */
        $categoria = categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        $categoria->delete();

        flash()->success('Categoria eliminado.');

        return redirect(route('categorias.index'));
    }
}
