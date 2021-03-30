<?php

use App\Http\Livewire\Posts;
use App\Http\Livewire\Post;
use App\Http\Livewire\Pages;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = Auth::user();
    $posts = $user->posts();
    return view('dashboard', compact('posts'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('posts', Posts::class)->name('posts');

Route::middleware(['auth:sanctum', 'verified'])->get('pages', Pages::class)->name('pages');
Route::middleware(['auth:sanctum', 'verified'])->get('pages/{id}', Pages::class);

Route::get('/contact', function () {
    return view('contact');
})->name('contact-form');

Route::middleware(['auth:sanctum', 'verified'])->get('posts/{id}', Post::class);

//This is connected to app/Http/Controllers/PostController (see detail in there)
Route::get('/postss/',[\App\Http\Controllers\PostController::class, 'index'])->name('public_posts_index');
Route::get('/postss/{id}',[\App\Http\Controllers\PostController::class, 'show'])->name('public_posts_show');

//This is connected to app/Http/Controllers/PageController (see detail in there)
Route::get('/pagess/',[\App\Http\Controllers\PageController::class, 'index'])->name('public_pages_index');
Route::get('/pagess/{id}',[\App\Http\Controllers\PageController::class, 'show'])->name('public_pages_show');
