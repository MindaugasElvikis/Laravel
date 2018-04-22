<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

/**
 * Class PostsController.
 */
class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->with('comments')->with('user')->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        dd('as esu create route');
    }

    public function show(Post $post)
    {
        dd($post->content);
    }

    public function stats()
    {
        dd('As dabar esu statistikoje');
    }
}
