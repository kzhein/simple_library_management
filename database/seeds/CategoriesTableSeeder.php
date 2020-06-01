<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        Category::create(['name' => 'Biography']);
        Category::create(['name' => 'Comic']);
        Category::create(['name' => 'Computer & Tech']);
        Category::create(['name' => 'Horror']);
        Category::create(['name' => 'History']);
        Category::create(['name' => 'Entertainment']);
        Category::create(['name' => 'Travel']);
    }
}
