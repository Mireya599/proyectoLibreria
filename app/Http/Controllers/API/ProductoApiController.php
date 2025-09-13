<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoApiController extends Controller
{
    public function search(Request $request)
    {
        $q = trim($request->get('q', ''));
        if (mb_strlen($q) < 2) return response()->json([]);

        $rows = Producto::query()
            ->with('unidadMedidas:id,nombre')
            ->where(fn($w)=> $w->where('codigo','like',"%$q%")
                ->orWhere('descripcion','like',"%$q%"))
            ->orderBy('descripcion')
            ->limit(30)
            ->get(['id','codigo','descripcion','precio_libreria','unidad_medidas_id']);

        return response()->json($rows->map(fn($p)=>[
            'id'     => $p->id,
            'codigo' => $p->codigo,
            'text'   => $p->descripcion,
            'precio' => (float) ($p->precio_libreria ?? 0),
            'unidad' => optional($p->unidadMedidas)->nombre ?? 'u',
        ]));
    }
}
