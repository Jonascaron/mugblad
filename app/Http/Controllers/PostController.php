<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $data = [
            'posts' => Posts::all(),
        ];
        return view('posts.index', $data);
    }

    public function create() {
        $data = [
            'posts' => Posts::all(),
        ];
        return view('posts.create', $data);
    }

    public function store(Request $request) {
        $Posts = new Posts();
        $Posts->title = $request->title;
        $Posts->description = $request->description;
        $Posts->cook_time = $request->cook_time;
        $Posts->category_id = $request->category;
        $Posts->save();
        return redirect('/recipes')->with('status', "Resept is gemaakt");
    }
}
