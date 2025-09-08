<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaDataTable;
use App\Http\Requests\CreateCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Categorias')->only('show');
        $this->middleware('permission:Crear Categorias')->only(['create','store']);
        $this->middleware('permission:Editar Categorias')->only(['edit','update']);
        $this->middleware('permission:Eliminar Categorias')->only('destroy');
    }
    /**
     * Display a listing of the Categoria.
     */
    public function index(CategoriaDataTable $categoriaDataTable)
    {
    return $categoriaDataTable->render('categorias.index');
    }


    /**
     * Show the form for creating a new Categoria.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categoria in storage.
     */
    public function store(CreateCategoriaRequest $request)
    {
        $input = $request->all();

        /** @var Categoria $categoria */
        $categoria = Categoria::create($input);

        flash()->success('Categoria guardado.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categoria.
     */
    public function show($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified Categoria.
     */
    public function edit($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified Categoria in storage.
     */
    public function update($id, UpdateCategoriaRequest $request)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

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
     * Remove the specified Categoria from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Categoria $categoria */
        $categoria = Categoria::find($id);

        if (empty($categoria)) {
            flash()->error('Categoria no encontrado');

            return redirect(route('categorias.index'));
        }

        $categoria->delete();

        flash()->success('Categoria eliminado.');

        return redirect(route('categorias.index'));
    }
}
