<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data = [
            'posts' => Posts::all(),
        ];
        return view('posts.index', $data);
    }

    public function create() {
        $data = [
            'posts' => Posts::all(),
            'categories' => Category::all(),
        ];
        return view('posts.create', $data);
    }

    public function store(Request $request) {

        //dd($request->all());

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->img->extension();

        $request->img->move(public_path('images'), $imageName);

        $Posts = new Posts();
        $Posts->title = $request->title;
        $Posts->image_path = 'images/' . $imageName;
        $Posts->description = $request->description;
        $Posts->user_id = $request->user;
        $Posts->category_id = $request->category;
        $Posts->save();
        return redirect('/posts')->with('status', "post is gemaakt");
    }
}
