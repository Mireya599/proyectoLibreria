<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleCompra extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'detalle_compras';

    public $fillable = [
        'cantidad',
        'precio_unitario',
        'subtotal',
        'compras_id',
        'productos_id',
        'update_at'
    ];

    protected $casts = [
        'cantidad' => 'decimal:2',
        'precio_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'update_at' => 'datetime'
    ];

    public static $rules = [
        'cantidad' => 'nullable|numeric',
        'precio_unitario' => 'nullable|numeric',
        'subtotal' => 'nullable|numeric',
        'compras_id' => 'required',
        'productos_id' => 'required',
        'created_at' => 'nullable',
        'update_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function compras(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Compra::class, 'compras_id');
    }

    public function productos(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Producto::class, 'productos_id');
    }
}
