<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleVenta extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'detalle_ventas';

    public $fillable = [
        'cantidad',
        'precio_unitario',
        'subtotal',
        'ventas_id'
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:0',
        'subtotal' => 'decimal:0'
    ];

    public static $rules = [
        'cantidad' => 'nullable',
        'precio_unitario' => 'nullable|numeric',
        'subtotal' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'ventas_id' => 'required'
    ];

    public static $messages = [

    ];

    public function ventas(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Venta::class, 'ventas_id');
    }
}
