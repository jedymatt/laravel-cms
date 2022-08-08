<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return inertia('Posts/Index', compact('posts'));
    }

    public function create()
    {
        return inertia('Posts/Create');
    }

    public function show(Post $post)
    {
        return inertia('Posts/Show', compact('post'));
    }

    public function store(Request $request)
    {
        return redirect()->route('posts.index');
        // $post = Post::create($request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]));

        // return redirect()->route('posts.show', $post);
    }
}
