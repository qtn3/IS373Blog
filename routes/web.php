<?php

use App\Http\Livewire\Posts;
use App\Http\Livewire\Post;
use App\Http\Livewire\Page;
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

Route::middleware(['auth:sanctum', 'verified'])->get('pages/{title}', Page::class)->name('pages');

Route::get('/contact', function () {
    return view('contact');
})->name('contact-form');

Route::middleware(['auth:sanctum', 'verified'])->get('posts/{id}', Post::class);
