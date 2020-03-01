<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'borrower_id', 'book_id', 'borrowed_from', 'borrowed_to', 'actual_return',
    ];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function borrower()
    {
        return $this->belongsTo('App\Borrower');
    }
}
