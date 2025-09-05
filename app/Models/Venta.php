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
        
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        
    ];

    public static $messages = [

    ];

    
}
