<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventario extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'inventarios';

    public $fillable = [
        'producto_id',
        'stock',
        'stock_minimo',
        'stock_maximo',
        'costo_promedio',
        'ubicacion'
    ];

    protected $casts = [
        'stock' => 'decimal:2',
        'stock_minimo' => 'decimal:2',
        'stock_maximo' => 'decimal:2',
        'costo_promedio' => 'decimal:2',
        'ubicacion' => 'string'
    ];

    public static $rules = [
        'producto_id' => 'required',
        'stock' => 'required|numeric',
        'stock_minimo' => 'required|numeric',
        'stock_maximo' => 'nullable|numeric',
        'costo_promedio' => 'nullable|numeric',
        'ubicacion' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function producto(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Producto::class, 'producto_id');
    }
}
