<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 20000,
            'is_published' => 0,
        ];
        $post = Post::firstOrCreate([
            'title' => 'updated',
        ], [
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 20000,
            'is_published' => 0,
        ]);

        dd($post);
    }

    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'some post'
        ], [
            'title' => 'some post',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 20,
            'is_published' => 0,
        ]);

        dd($post);
    }
}
