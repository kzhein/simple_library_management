<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrower;

class BorrowerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $borrowers = Borrower::all();
        return view('borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store()
    {

        $data = request()->validate([
            'name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'phone' => ['required', 'numeric'],
        ]); 

        Borrower::create($data);

        return redirect('/dashboard/borrower')->with('info', 'Borrower added successfully');

    }

    public function edit(Borrower $borrower)
    {
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(Borrower $borrower)
    {
        $data = request()->validate([
            'name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required',
            'phone' => ['required', 'numeric'],
        ]);



        $borrower->update($data);

        return redirect('/dashboard/borrower')->with('info', 'Borrower edited successfully');
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();
        return redirect('/dashboard/borrower')->with('info', 'Borrower deleted successfully');
    }
}
