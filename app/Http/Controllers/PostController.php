<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::where('is_published', 0)->first();
        // dd($post->title);
        // dd('end');

    // $cat = Category::find(1);
        // $post = Post::find(1);
        // dd($post->category);

        $posts = Post::all();
        return view("post.index", compact("posts"));
    }

    public function create()
    {
        return view("post.create");
    }

    public function store()
    {
        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "likes" => "string",
        ]);

        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "likes" => "string",
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);                                                                                                                                                                                                                                                                                                                                                                                                               

    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('post.index');
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
