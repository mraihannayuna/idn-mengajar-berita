<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $posts = Post::where('deleted_at', null)->get();

        $view_data = [
            'posts' => $posts,
        ];
        return view('landing', $view_data);
    }
}
