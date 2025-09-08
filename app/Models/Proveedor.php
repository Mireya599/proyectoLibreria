<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'proveedores';

    public $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo'
    ];

    protected $casts = [
        'nombre' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'correo' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:100',
        'telefono' => 'nullable|string|max:15',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function productos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Producto::class, 'proveedores_id');
    }
}
