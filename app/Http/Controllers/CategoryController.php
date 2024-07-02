<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Novelas' => Book::where('categoria', 'Novela')->get(),
            'Cuentos' => Book::where('categoria', 'Cuento')->get(),
            'Suspenso' => Book::where('categoria', 'Suspenso')->get(),
            'Dramas' => Book::where('categoria', 'Drama')->get(),
            'Ficción histórica' => Book::where('categoria', 'Ficcion_historica')->get(),
        ];


        return view('categorias', compact('categories'));
    }

}
