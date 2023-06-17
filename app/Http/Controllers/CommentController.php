<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(CommentRequest $request) {

        Comment::create($request->all());
        return redirect()->route('posts.show', ['post' => $request->post_id]);
    }

}

