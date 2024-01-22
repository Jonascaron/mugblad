<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $data = [
            'categories' => Category::all()
        ];
        return view('categories.index', $data);
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect('/category')->with('status', "category is gemaakt");
    }

    public function update(Category $category, Request $request)
    {
        $category->title = $request->title;
        $category->save();

        return redirect('/recipes');
    }

    public function edit(Category $category)
    {
        $data = [
            'categories' => $category
        ];
        return view('categories.index', $data);
    }
}
