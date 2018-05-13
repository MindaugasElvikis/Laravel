<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostsController.
 */
class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->with('comments')->with('user')->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * @param Request $request
     */
    public function store(PostRequest $request)
    {
    }

    public function edit(Request $request)
    {

    }

    public function show(Post $post)
    {
    }

    public function stats()
    {
        dd('As dabar esu statistikoje');
    }
}
