<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function show(Post $post)
    {
    }

    public function edit(Post $post)
    {
    }

    public function store()
    {
    }

    public function update(Post $post)
    {
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
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
