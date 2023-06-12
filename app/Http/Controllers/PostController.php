<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        $request->user()->posts()->create([
            'title' => $title = $request->title,
            'slug' => Str::slug($title),
            'body' => $request->body
        ]);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post) {
        // return view('posts.edit', ['post' => $post]);
        return view('posts.edit', compact('post'));
    }

    public function destroy(Post $post) {

        $post -> delete();
        return back();
    }
}
