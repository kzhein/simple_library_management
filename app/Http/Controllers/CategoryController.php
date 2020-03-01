<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'unique:categories']
        ]);

        Category::create($data);

        return redirect('/dashboard/category')->with('info', 'Category added successfully');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Category $category)
    {
        $data = request()->validate([
            'name' => ['required', 'unique:categories']
        ]);

        $category->update($data);

        return redirect('/dashboard/category')->with('info', 'Category edited successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/dashboard/category')->with('info', 'Category deleted successfully');
    }
}
