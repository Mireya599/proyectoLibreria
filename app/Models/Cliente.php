<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'clientes';

    public $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'nit'
    ];

    protected $casts = [
        'nombre' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'correo' => 'string',
        'nit' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:100',
        'telefono' => 'nullable|string|max:15',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|string|max:50',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'nit' => 'nullable|string|max:20'
    ];

    public static $messages = [

    ];

    public function ventas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Venta::class, 'clientes_id');
    }
}
