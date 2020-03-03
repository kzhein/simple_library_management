<?php

use Illuminate\Database\Seeder;
use App\Book;
use App\Borrower;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(BooksTableSeeder::class);
       $this->call(BorrowersTableSeeder::class);
       $this->call(CategoriesTableSeeder::class);
       $this->call(UsersTableSeeder::class);
    }
}
