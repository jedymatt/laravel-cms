<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // create post with unique slug
        $post = Post::create([
            'title' => $request->title,
            'slug' => PostService::generateUniqueSlug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }
}
