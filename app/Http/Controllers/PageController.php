<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function show($id)
    {
        return view('pageview', [
            'page' => Page::findOrFail($id)
        ]);
    }
    //This is connected to resources/views/pagess.blade.php ('posts' is a variable inside pagess.blade.php)
    public function index()
    {
        return view('pagess', [
            'pages' => Page::all()
        ]);
    }
}
