<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 
        'imagen_portada', 
        'autor', 
        'categoria', 
        'precio'
    ];
}
