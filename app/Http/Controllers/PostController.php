<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct() {
        $this->middleware('IsAdmin')->except('show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $posts = Post::where('deleted_at', null)->where('author', $user)->get();
        $deleted_posts = Post::onlyTrashed()->where('author', $user)->get();
        $active = $posts->count();
        $deleted = $deleted_posts->count();

        return view('posts.index', compact('posts', 'active', 'deleted'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request['author'] = Auth::user()->id;


        if ($request->file) {
            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            Storage::putFileAs('img', $request->file, $fileName . '.' . $extension);

            $request['image'] = $fileName . '.' . $extension;
        }

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();

        $post->update($data);

        return redirect()->route('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');

    }

    public function trash(){
        $posts = Post::onlyTrashed()->where('author', Auth::user()->id)->get();

        return view('posts.trash', compact('posts'));
    }
}
