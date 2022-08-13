<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\UploadedFile;

class PostService
{
    // generate unique slug from title
    public static function generateUniqueSlug(string $title)
    {
        $slug = \Str::slug($title);
        $count = Post::where('slug', $slug)->count();

        return $count ? $slug.'-'.$count : $slug;
    }

    public static function uploadCoverImage(?UploadedFile $file): ?string
    {
        return $file?->storeOnCloudinary('cover-images')->getSecurePath();
    }
}
