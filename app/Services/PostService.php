<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostService
{
    // generate unique slug from title
    public static function generateUniqueSlug(string $title)
    {
        $slug = \Str::slug($title);
        $count = Post::where('slug', $slug)->count();

        return $count ? $slug.'-'.$count : $slug;
    }

    public static function uploadCoverImage(Post $post, ?UploadedFile $file): ?string
    {
        if ($file === null) {
            return null;
        }

        return cloudinary()->upload($file->getRealPath(), [
            'public_id' => 'cover',
            'folder' => 'posts/'.$post->id,
            'transformation' => [
                'quality' => 'auto',
                'fetch_format' => 'auto',
            ],
        ])->getSecurePath();
    }

    /**
     * Delete post and all its related images.
     */
    public static function deletePost(Post $post)
    {
        Storage::disk('cloudinary')->deleteDirectory('posts/'.$post->id);
        $post->delete();
    }
}
