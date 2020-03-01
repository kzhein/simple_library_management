<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'isbn', 'title', 'author', 'year', 'language', 'category_id', 'no_of_copies_actual', 'no_of_copies_current', 
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
