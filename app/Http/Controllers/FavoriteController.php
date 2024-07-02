<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite($bookId)
    {
        $user = Auth::user();
        $favorites = $user->favorite_books ?? [];

        if (($key = array_search($bookId, $favorites)) !== false) {
            unset($favorites[$key]);
        } else {
            $favorites[] = $bookId;
        }

        $user->favorite_books = array_values($favorites);
        $user->save();

        return redirect()->back()->with('status', 'Favoritos actualizados');
    }

    public function showFavorites()
{
    $user = Auth::user();
    $favoriteBooksIds = $user->favorite_books ?? [];
    
    // Revertimos el orden de $favoriteBooksIds
    $favoriteBooksIds = array_reverse($favoriteBooksIds);

    // Recupera los libros en el orden invertido de $favoriteBooksIds
    $favoriteBooks = Book::whereIn('id', $favoriteBooksIds)->get()->sortBy(function ($book) use ($favoriteBooksIds) {
        return array_search($book->id, $favoriteBooksIds);
    });

    return view('favorites', compact('favoriteBooks'));
}
}
