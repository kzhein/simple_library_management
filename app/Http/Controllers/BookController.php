<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store()
    {
        $data = request()->validate([
            'isbn' => ['required', 'unique:books'],
            'title' => 'required',
            'author' => 'required',
            'year' => ['required', 'numeric'],
            'language' => 'required',
            'category_id' => ['required', 'numeric'],
            'no_of_copies_actual' => ['required', 'numeric'],
            'no_of_copies_current' => ['required', 'numeric'],
        ]);
        
        Book::create($data);

        return redirect('/dashboard/book')->with('info', 'Book added successfully');

    }

    public function edit(Book $book)
    {
        $categories = \App\Category::all();
        return view('books.edit', compact(['book', 'categories']));
    }

    public function update(Book $book)
    {
        $data = request()->validate([
            'isbn' => 'required',
            'title' => 'required',
            'author' => 'required',
            'year' => ['required', 'numeric'],
            'language' => 'required',
            'category_id' => ['required', 'numeric'],
            'no_of_copies_actual' => ['required', 'numeric'],
            'no_of_copies_current' => ['required', 'numeric'],
        ]);

        $book->update($data);

        return redirect('/dashboard/book')->with('info', 'Book edited successfully');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/dashboard/book')->with('info', 'Book deleted successfully');
    }
}
