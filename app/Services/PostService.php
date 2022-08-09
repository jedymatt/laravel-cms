<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    // generate unique slug from title
    public static function generateUniqueSlug(string $title)
    {
        $slug = \Str::slug($title);
        $count = Post::where('slug', $slug)->count();

        return $count ? $slug.'-'.$count : $slug;
    }
}
