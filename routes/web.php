<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return inertia('Index');
    });

    Route::resource('posts', PostController::class)
        ->scoped([
            'post' => 'slug',
        ]);

    Route::post('upload-image', function () {
        $fileName = request()->file('image')->store('images', 'public');

        return back()->with([
            'message' => [
                'image_url' => Storage::disk('public')->url($fileName),
            ],
        ]);
    })
        ->name('upload-image');
});

require __DIR__.'/auth.php';
