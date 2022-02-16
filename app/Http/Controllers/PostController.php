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

    public function update()
    {
        $post = Post::find(4);
        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 20,
            'is_published' => 0,
        ]);
        dd('updated');
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
