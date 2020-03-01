<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    protected $fillable = [
        'name', 'sex', 'date_of_birth', 'phone', 
    ];
}
