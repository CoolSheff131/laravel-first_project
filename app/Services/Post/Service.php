<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            $post->tags()->attach($tags);
            DB::commit();
            return $post;
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);
            $post->update($data);
            $post->tags()->sync($tags);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
