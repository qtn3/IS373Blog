<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //This is connected to resources/views/postview.blade.php ('post' is a variable inside postview.blade.php)
    public function show($id)
    {
        return view('postview', [
            'post' => Post::findOrFail($id)
        ]);
    }
    //This is connected to resources/views/postss.blade.php ('posts' is a variable inside postss.blade.php)
    public function index()
    {
        return view('postss', [
            'posts' => Post::all()
        ]);
    }
}
