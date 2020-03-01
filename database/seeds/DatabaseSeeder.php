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
        // $this->call(UsersTableSeeder::class);
        $isbn = ['0307387178', '0307590615', '1563893428', '0070681880', '1419707299'];
        $title = ['Into the Wild', 'Desicion Points', 'The Dark Knight Returns', 'Discrete Mathematics and Its Applications : With Combinatorics and Graph Theory', 'The Third Wheel: Diary of a Wimpy Kid'];
        $author = ['Jon Krakauer', 'George W. Bush', 'Frank Miller', 'Kenneth H. Rosen', 'Jeff Kinney'];
        $year = ['2007', '2010', '1997', '2012', '2012'];
        $language = ['English', 'English', 'English', 'English', 'English'];
        $category_id = [1, 1, 2, 3, 6];
        $no_of_copies_actual = [2, 3, 1, 2, 2];
        $no_of_copies_current = [2, 3, 1, 2, 2];

        for($i = 0; $i < sizeof($isbn); $i++) {
            Book::create([
                'id' => $i+1,
                'isbn' => $isbn[$i],
                'title' => $title[$i],
                'author' => $author[$i],
                'year' => $year[$i],
                'language' => $language[$i],
                'category_id' => $category_id[$i],
                'no_of_copies_actual' => $no_of_copies_actual[$i],
                'no_of_copies_current' => $no_of_copies_current[$i]
            ]);
        }

        $name = ['Alice', 'Bob', 'Charlie', 'Dean', 'Harry'];
        $sex = ['Female', 'Male', 'Male', 'Male', 'Male'];
        $date_of_birth = ['1994-07-12', '1995-02-15', '2000-05-22', '1997-08-02', '1999-04-22'];
        $phone = ['09773358373', '09793756473', '09795323543', '092005223', '09783865964'];
        for($i=0; $i<sizeof($name); $i++) {
            Borrower::create([
                'id' => $i+1,
                'name' => $name[$i],
                'sex' => $sex[$i],
                'date_of_birth' => $date_of_birth[$i],
                'phone' => $phone[$i]
            ]);
        }

        $category = ['Biography', 'Comic', 'Computer & Tech', 'Horror', 'History', 'Entertainment', 'Travel'];
        for($i=0; $i<sizeof($category); $i++) {
            Category::create([
                'id' => $i+1,
                'name' => $category[$i]
            ]);
        }
    }
}
