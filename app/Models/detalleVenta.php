<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class detalleVenta extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'detalle_ventas';

    public $fillable = [
        
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        
    ];

    public static $messages = [

    ];

    
}
