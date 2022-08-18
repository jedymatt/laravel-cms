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
            'cover_image_url' => 'required|url',
            'content' => 'required|string',
        ]);

        $coverImageFile = $request->file('cover_image');

        $post = Post::create([
            'title' => $request->title,
            'slug' => PostService::generateUniqueSlug($request->title),
            'cover_image_url' => $request->cover_image_url,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return inertia('Posts/Edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        PostService::deletePost($post);

        return redirect()->route('posts.index');
    }
}
