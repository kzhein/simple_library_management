<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();

        Book::create([
            'isbn' => '0307387178',
            'title' => 'Into the wild',
            'author' => 'Jon Krakauer',
            'year' => '2007',
            'language' => 'English',
            'category_id' => 1,
            'no_of_copies_actual' => 2,
            'no_of_copies_current' => 2,
        ]);

        Book::create([
            'isbn' => '0307590615',
            'title' => 'Desicion Points',
            'author' => 'George W. Bush',
            'year' => '2010',
            'language' => 'English',
            'category_id' => 1,
            'no_of_copies_actual' => 3,
            'no_of_copies_current' => 3,
        ]);

        Book::create([
            'isbn' => '1563893428',
            'title' => 'The Dark Knight Returns',
            'author' => 'Frank Miller',
            'year' => '1997',
            'language' => 'English',
            'category_id' => 2,
            'no_of_copies_actual' => 1,
            'no_of_copies_current' => 1,
        ]);

        Book::create([
            'isbn' => '0070681880',
            'title' => 'Discrete Mathematics and Its Applications : With Combinatorics and Graph Theory',
            'author' => 'Kenneth H. Rosen',
            'year' => '2012',
            'language' => 'English',
            'category_id' => 3,
            'no_of_copies_actual' => 2,
            'no_of_copies_current' => 2,
        ]);

        Book::create([
            'isbn' => '1419707299',
            'title' => 'The Third Wheel: Diary of a Wimpy Kid',
            'author' => 'Jeff Kinney',
            'year' => '2012',
            'language' => 'English',
            'category_id' => 6,
            'no_of_copies_actual' => 2,
            'no_of_copies_current' => 2,
        ]);


    }
}
