<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Obtener los libros recientemente vistos
        $recienVistos = collect();
        if ($user->recien_vistos) {
            $recienVistosIds = $user->recien_vistos;
            $recienVistos = Book::whereIn('id', $recienVistosIds)->get()->sortBy(function($book) use ($recienVistosIds) {
                return array_search($book->id, $recienVistosIds);
            });
        }

        // Obtener los primeros 6 libros
        $firstSectionBooks = Book::take(6)->get();

        // Obtener los siguientes 12 libros (en orden aleatorio)
        $secondSectionBooks = Book::inRandomOrder()->take(12)->get();

        return view('biblioteca', [
            'recienVistos' => $recienVistos,
            'firstSectionBooks' => $firstSectionBooks,
            'secondSectionBooks' => $secondSectionBooks
        ]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $user = Auth::user();

        // Actualizar el historial de libros recién vistos
        $recienVistos = $user->recien_vistos ?? [];
        array_unshift($recienVistos, $book->id);
        $recienVistos = array_unique($recienVistos);
        $recienVistos = array_slice($recienVistos, 0, 6); // Limitar a los 6 más recientes

        $user->recien_vistos = $recienVistos;
        $user->save();

        return view('book', compact('book'));
    }
}
