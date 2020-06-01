<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalBooks = \App\Book::sum('no_of_copies_actual');
        $availableBooks = \App\Book::sum('no_of_copies_current');
        $borrowedBooks = $totalBooks - $availableBooks;

        $totalBorrowers = \App\Borrower::count();

        $totalOverdueBooks =  \App\Record::where([ ['actual_return', '=', NULL], ['borrowed_to', '<', date('Y-m-d')] ])->count();

        // For pie chart

        $all = \App\Record::all();
        $total = \App\Record::count();
        $allCategoryIds = [];
        foreach($all as $single) {
            array_push($allCategoryIds, $single->book->category_id);
        }

        $categoryIdCounts = array_count_values($allCategoryIds);


        foreach($categoryIdCounts as $key => $value) {
            $categoryIdCounts[$key] = round(($value/$total)*100, 2);
            $newKey = \App\Category::find($key);
            $categoryIdCounts[ $newKey->name ] = $categoryIdCounts[$key];
            unset($categoryIdCounts[$key]);
        }

        arsort($categoryIdCounts);
        
        // end of pie chart
        
        return view('dashboard.index', compact([
            'totalBooks', 'availableBooks', 'borrowedBooks', 'totalBorrowers', 'totalOverdueBooks', 'categoryIdCounts'
            ]));
    }
}
