<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compra extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'compras';

    public $fillable = [
        'codigo_factura',
        'fecha_compra',
        'tipo_pago',
        'total'
    ];

    protected $casts = [
        'codigo_factura' => 'string',
        'fecha_compra' => 'datetime',
        'tipo_pago' => 'string',
        'total' => 'decimal:2'
    ];

    public static $rules = [
        'codigo_factura' => 'nullable|string|max:50',
        'fecha_compra' => 'nullable',
        'tipo_pago' => 'nullable|string',
        'total' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function detalleCompras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\DetalleCompra::class, 'compras_id');
    }
}
