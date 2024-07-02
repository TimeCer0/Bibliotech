<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Pagina Principal Bibliotech
Route::get('/biblioteca', function () {
    return view('biblioteca');
});

Route::get('/perfil', function () {
    return view('profile');
})->middleware('auth');

Route::get('/avisolegal', function () {
    return view('avisolegal');
});



//Ruta pagina principal Biblioteca
use App\Http\Controllers\LibraryController;
Route::get('/biblioteca', [LibraryController::class, 'index'])->name('biblioteca');
use App\Http\Middleware\VerifiedMiddleware;
//Ruta filtrada de usuarios 'verified' o 'Admin' hacia el contenido de libros
Route::get('/biblioteca/{id}', [LibraryController::class, 'show'])->name('book.show')->middleware([VerifiedMiddleware::class]);


//Ruta de Funciones de Gestion de Libros solo accesible al Admin    
use App\Http\Controllers\BookController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/books', [BookController::class, 'index'])->name('books.index')->middleware([AdminMiddleware::class]);
Route::post('/books', [BookController::class, 'store'])->name('books.store');

//Ruta pagina de Categorias

use App\Http\Controllers\CategoryController;

Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias.index');

//ruta de boton de verificado 
use App\Http\Controllers\VerifiedController;

Route::get('/verify-user', [VerifiedController::class, 'verify'])->name('verify.user');

// ruta de toggle de libro favorito

use App\Http\Controllers\FavoriteController;

Route::post('/favorites/toggle/{id}', [FavoriteController::class, 'toggleFavorite'])->name('favorites.toggle');
Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites.index');

// ruta de toggle de libro leído

use App\Http\Controllers\ReadedController;

Route::post('/readeds/toggle/{id}', [ReadedController::class, 'toggleReaded'])->name('readeds.toggle');
Route::get('/readeds', [ReadedController::class, 'showReadeds'])->name('readeds.index');

//search bar en la barra de nav
Route::get("search", [BookController::class, 'search']);


require __DIR__.'/auth.php';