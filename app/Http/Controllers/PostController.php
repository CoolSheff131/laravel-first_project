<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::find(1);
        dump($post);
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'title',
                'content' => 'cont',
                'image' => 'img',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'another',
                'content' => 'cont',
                'image' => 'img',
                'likes' => 20,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
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
}
