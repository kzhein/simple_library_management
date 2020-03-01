<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Record;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $records = Record::all();
        return view('record.index', compact('records'));
    }
}
