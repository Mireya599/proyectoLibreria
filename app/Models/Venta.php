<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'ventas';

    public $fillable = [
        'codigo_factura',
        'total',
        'tipo_pago',
        'fecha_venta',
        'clientes_id'
    ];

    protected $casts = [
        'codigo_factura' => 'string',
        'total' => 'decimal:0',
        'tipo_pago' => 'string',
        'fecha_venta' => 'datetime'
    ];

    public static $rules = [
        'codigo_factura' => 'required|string|max:50',
        'total' => 'nullable|numeric',
        'tipo_pago' => 'nullable|string',
        'fecha_venta' => 'nullable',
        'clientes_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function clientes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'clientes_id');
    }

    public function detalleVentas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\DetalleVenta::class, 'ventas_id');
    }

    public function ventaBitacoras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\VentaBitacora::class, 'ventas_id');
    }
}
