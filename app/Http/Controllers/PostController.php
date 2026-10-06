<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        $post = Post::where('is_published', 0)->first();
        dd($post->title);
        dd('end');
    }

    function create(){
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
}
