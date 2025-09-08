<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'productos';

    public $fillable = [
        'codigo',
        'descripcion',
        'cantidad',
        'precio_fabrica',
        'total_fabrica',
        'precio_libreria',
        'total_libreria',
        'ganancia',
        'categorias_id',
        'proveedores_id',
        'unidad_medidas_id'
    ];

    protected $casts = [
        'codigo' => 'string',
        'descripcion' => 'string',
        'cantidad' => 'decimal:2',
        'precio_fabrica' => 'decimal:2',
        'total_fabrica' => 'decimal:2',
        'precio_libreria' => 'decimal:2',
        'total_libreria' => 'decimal:2',
        'ganancia' => 'decimal:2'
    ];

    public static $rules = [
        'codigo' => 'required|string|max:100',
        'descripcion' => 'nullable|string|max:255',
        'cantidad' => 'nullable|numeric',
        'precio_fabrica' => 'nullable|numeric',
        'total_fabrica' => 'nullable|numeric',
        'precio_libreria' => 'nullable|numeric',
        'total_libreria' => 'nullable|numeric',
        'ganancia' => 'nullable|numeric',
        'categorias_id' => 'required',
        'proveedores_id' => 'required',
        'unidad_medidas_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function categorias(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categorias_id');
    }

    public function proveedores(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Proveedore::class, 'proveedores_id');
    }

    public function unidadMedidas(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\UnidadMedida::class, 'unidad_medidas_id');
    }

    public function detalleCompras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\DetalleCompra::class, 'productos_id');
    }

    public function productoBitacoras(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ProductoBitacora::class, 'productos_id');
    }
}
