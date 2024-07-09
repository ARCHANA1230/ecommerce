<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $booksQuery = Book::available();

        if ($search) {
            $booksQuery = $booksQuery->where(function($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                      ->orWhere('author', 'like', "%$search%");
            });
        }

        $books = $booksQuery->paginate(10); 

        return view('books.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            abort(404);
        }

        return view('books.show', ['book' => $book]);
    }
}
