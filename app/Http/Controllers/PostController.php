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
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // create post with unique slug
        $post = Post::create([
            'title' => $request->title,
            'slug' => $this->getUniquePostSlug($request->title),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    protected function getUniquePostSlug(string $title)
    {
        $slug = \Str::slug($title);
        $count = Post::where('slug', $slug)->count();
        if ($count > 0) {
            $slug .= '-' . $count;
        }

        return $slug;
    }
}
