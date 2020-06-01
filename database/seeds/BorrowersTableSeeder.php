<?php

use Illuminate\Database\Seeder;
use App\Borrower;

class BorrowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrower::truncate();

        Borrower::create([
            'name' => 'Alice',
            'sex' => 'Female',
            'date_of_birth' => '1994-07-12',
            'phone' => '09773358373',
        ]);

        Borrower::create([
            'name' => 'Bob',
            'sex' => 'Male',
            'date_of_birth' => '1995-02-15',
            'phone' => '09793756473',
        ]);

        Borrower::create([
            'name' => 'Charlie',
            'sex' => 'Male',
            'date_of_birth' => '2000-05-22',
            'phone' => '09795323543',
        ]);

        Borrower::create([
            'name' => 'Dean',
            'sex' => 'Male',
            'date_of_birth' => '1997-08-02',
            'phone' => '092005223',
        ]);

        Borrower::create([
            'name' => 'Harry',
            'sex' => 'Male',
            'date_of_birth' => '1999-04-22',
            'phone' => '09783865964',
        ]);
    }
}
