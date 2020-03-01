<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class RentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $availableBooks = \App\Book::where('no_of_copies_current', '>=', 1)->get();
        $borrowers = \App\Borrower::all();

        return view('rent.index', compact(['availableBooks', 'borrowers']));
    }

    public function store()
    {

        $data = request()->validate([
            'book_id' => ['required', 'numeric'],
            'borrower_id' => ['required', 'numeric'],
            'borrowed_to' => 'required',
        ]);


        $book = \App\Book::find(request('book_id'));

        if($book->no_of_copies_current >= 1) {

            $record = new Record;
            $record->borrower_id = request('borrower_id');
            $record->book_id = request('book_id');
            $record->borrowed_from = date('Y-m-d');
            $record->borrowed_to = request('borrowed_to');
            $record->actual_return = null;
            $record->save();

            $book->no_of_copies_current -= 1;
            $book->save();

        }
        
        return redirect('/dashboard/rent')->with('info', 'Book rented successfully');

    }
}
