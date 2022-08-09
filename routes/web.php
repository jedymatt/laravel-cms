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

Route::get('/', function () {
    return inertia('Index');
});

Route::resource('posts', PostController::class)
    ->only('index', 'show', 'create', 'store')
    ->scoped([
        'post' => 'slug',
    ]);

require __DIR__.'/auth.php';
