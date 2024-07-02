<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ReadedController extends Controller
{
    public function toggleReaded($bookId)
    {
        $user = Auth::user();
        $readeds = $user->readed_books ?? [];

        if (($key = array_search($bookId, $readeds)) !== false) {
            unset($readeds[$key]);
        } else {
            $readeds[] = $bookId;
        }

        $user->readed_books = array_values($readeds);
        $user->save();

        return redirect()->back()->with('status', 'Favoritos actualizados');
    }

    public function showReadeds()
{
    $user = Auth::user();
    $readedBooksIds = $user->readed_books ?? [];
    
    // Revertimos el orden de $readedBooksIds
    $readedBooksIds = array_reverse($readedBooksIds);

    // Recupera los libros en el orden invertido de $readedBooksIds
    $readedBooks = Book::whereIn('id', $readedBooksIds)->get()->sortBy(function ($book) use ($readedBooksIds) {
        return array_search($book->id, $readedBooksIds);
    });

    return view('readeds', compact('readedBooks'));
}
}
