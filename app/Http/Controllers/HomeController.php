<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    function home()
    {
        $posts_count = Post::count();
        $users_count = User::count();
        return view('home.index', compact('posts_count', 'users_count'));
    }
}
