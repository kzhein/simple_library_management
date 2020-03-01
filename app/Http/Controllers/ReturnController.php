<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;

class ReturnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = Record::where('actual_return', '=', NULL)->get();
        return view('return.index', compact('records'));
    }

    public function update(Record $return)
    {
        $book = \App\Book::find($return->book_id);
        $book->no_of_copies_current += 1;
        $book->save();

        $return->actual_return = date('Y-m-d');
        $return->save();

        return redirect('/dashboard/return')->with('info', 'Book successfully returned');
    }
}
