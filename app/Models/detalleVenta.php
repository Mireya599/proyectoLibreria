<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleVenta extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'detalle_ventas';

    // AGREGA todos los campos que realmente insertas en store()
    public $fillable = [
        'ventas_id',
        'producto_id',
        'descripcion',
        'unidad',
        'cantidad',
        'precio_unitario',
        'subtotal',
        'lista_precio',
//        'unidad_id'
    ];

    // Usa 2 decimales para importes
    protected $casts = [
        'precio_unitario' => 'decimal:2',
        'subtotal'        => 'decimal:2',
    ];

    // Reglas para crear un renglón (opcionales si ya validas en el controller)
    public static $rules = [
        'ventas_id'       => 'required|integer',
        'producto_id'     => 'nullable|integer',
//        'unidad_id'       => 'nullable|integer',
        'lista_precio'    => 'nullable|in:venta,mayorista',
        'descripcion'     => 'nullable|string|max:255',
        'unidad'          => 'nullable|string|max:50',
        'cantidad'        => 'required|integer|min:1',
        'precio_unitario' => 'required|numeric|min:0',
        'subtotal'        => 'required|numeric|min:0',
        'created_at'      => 'nullable',
        'updated_at'      => 'nullable',
        'deleted_at'      => 'nullable',
    ];

    // Relaciones
    public function venta()
    {
        return $this->belongsTo(\App\Models\Venta::class, 'ventas_id');
    }

    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id');
    }

    public function unidadMedida()
    {
        return $this->belongsTo(\App\Models\UnidadMedida::class, 'unidad_id');
    }
}
