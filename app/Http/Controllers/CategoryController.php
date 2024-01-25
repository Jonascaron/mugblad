<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

        return redirect('/category')->with('status', "category is geupdate");
    }

    public function edit(Category $category)
    {
        $data = [
            'category' => $category
        ];
        return view('categories.update', $data);
    }

    public function delete(Category $category)
    {
        $category->posts()->delete();
        $category->delete();

        return redirect('/category')->with('status', 'category deleted');
    }
}
