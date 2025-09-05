<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class producto extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'productos';

    public $fillable = [
        
    ];

    protected $casts = [
        
    ];

    public static $rules = [
        
    ];

    public static $messages = [

    ];

    
}
