<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadMedida extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'unidad_medidas';

    public $fillable = [
        'nombre',
        'categoria',
        'unidad_comercial',
        'equivalencia',
        'factor'
    ];

    protected $casts = [
        'nombre' => 'string',
        'categoria' => 'string',
        'unidad_comercial' => 'string',
        'equivalencia' => 'string',
        'factor' => 'decimal:4'
    ];

    public static $rules = [
        'nombre' => 'nullable|string|max:45',
        'categoria' => 'nullable|string|max:60',
        'unidad_comercial' => 'nullable|string|max:120',
        'equivalencia' => 'nullable|string|max:120',
        'factor' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function productos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Producto::class, 'unidad_medidas_id');
    }

    public function unidadEquivalencias(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\UnidadEquivalencia::class, 'unidad_base_id');
    }

    public function unidadEquivalencia1s(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\UnidadEquivalencia::class, 'unidad_id');
    }
}
