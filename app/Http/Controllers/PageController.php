<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home () {
        return view('home');
    }

    public function blog () {

        // $posts = Post::get();
        // $posts = Post::first();
        // $posts = Post::find(25);
        // $posts = [
        //     ['id' => 1, 'title' => 'PHP', 'slug' => 'php'],
        //     ['id' => 2, 'title' => 'Laravel', 'slug' => 'laravel']
        // ];
        $posts = Post::latest()->paginate();
        // dd($post);
        return view('blog', ['posts' => $posts]);
    }

    public function post (Post $post) {

        return view('post', ['post' => $post]);
    }
}
