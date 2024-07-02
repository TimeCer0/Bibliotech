<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function create()
    {
        return view('books.index');
    }

    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
    
        return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'imagen_portada' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'autor' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'contenido' => 'required|file|mimes:txt|max:2048',
        ]);

        // Definir rutas de almacenamiento en el directorio `public`
        $publicPath = public_path();

        // Guardar imagen de portada en `public/books`
        $imagenPortada = $request->file('imagen_portada');
        $imagenPortadaPath = 'storage/books/' . $imagenPortada->getClientOriginalName();
        $imagenPortada->move($publicPath . '/storage/books', $imagenPortada->getClientOriginalName());

        // Guardar contenido del libro en `public/content_book`
        $contenido = $request->file('contenido');
        $contenidoPath = 'storage/content_book/' . $contenido->getClientOriginalName();
        $contenido->move($publicPath . '/storage/content_book', $contenido->getClientOriginalName());

        // Crear un nuevo registro en la base de datos
        $book = new Book();
        $book->titulo = $request->titulo;
        $book->imagen_portada = $imagenPortadaPath;
        $book->autor = $request->autor;
        $book->categoria = $request->categoria;
        $book->contenido = $contenidoPath;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Libro guardado exitosamente!');
    }
    
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->search;

            // Verificar que la longitud de la consulta sea mayor o igual a 2 caracteres
            if (strlen($query) < 2) {
                return response()->json(['html' => '']);
            }

            // Obtener datos de libros que coincidan con la consulta, limitando los resultados a 4
            $data = Book::where('id', 'like', '%' . $query . '%')
                ->orWhere('titulo', 'like', '%' . $query . '%')
                ->take(5)
                ->get();

            // Inicializar variable de salida
            $output = '';

            // Si se encontraron resultados, construir el HTML
            if (count($data) > 0) {
                $output = '
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                    </tr>
                    </thead>
                    <tbody>';

                foreach ($data as $row) {
                    $output .= '
                    <tr>
                        <th scope="row">' . $row->id . '</th>
                        <td><a href="/biblioteca/' . $row->id . '">' . $row->titulo . '</a></td>
                    </tr>';
                }

                $output .= '
                    </tbody>
                    </table>';

            } else {
                $output = 'No results';
            }

            // Devolver la respuesta JSON con el HTML construido
            return $output;
        }
    }
    
}





