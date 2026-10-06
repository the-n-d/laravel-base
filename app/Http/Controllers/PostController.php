<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('is_published', 0)->first();
        dd($post->title);
        dd('end');
    }

    public function create()
    {
        $posts = [
            [
                'title' => 'Пост 1',
                'content' => 'Контент первого поста',
                'image' => 'image1.jpg',
                'likes' => 5,
                'is_published' => 1,
            ],
            [
                'title' => 'Пост 2',
                'content' => 'Контент второго поста',
                'image' => 'image2.jpg',
                'likes' => 10,
                'is_published' => 1,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        dump("created");
    }

    public function update()
    {
        $post = Post::find(1);

        $post->update([
            'likes' => 100000,
            'title' => 'pivo',
        ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }

    public function firstOrCreate()
    {
        $post = Post::firstOrCreate(
            [
                'title' => 'сам пост',
            ],
            [
                'title' => 'сам пост',
                'content' => 'сам контент',
                'image' => 'img.jpg',
                'likes' => 5000,
                'is_published' => 1,
            ]
        );

        dump($post->content);
    }

    public function UpdateOrCreate($id, $title, $content)
    {
        $post = Post::updateOrCreate(
            [
                'title' => 'сам пост',
            ],
            [
                'title' => 'Новао',
                'content' => 'сам да контент',
                'image' => 'img.jpg',
                'likes' => 5000,
                'is_published' => 1,
            ]
        );

        dump($post->content);
    }
}
