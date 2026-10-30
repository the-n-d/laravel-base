<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $post = Post::where('is_published', 0)->first();
        // dd($post->title);
        // dd('end');

        $posts = Post::all();

        return view("post.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.create", compact("categories", "tags"));
    }

    public function store()
    {
        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "likes" => "string",
            "category_id" => "string",
            "tags" => "",
        ]);

        $tags = $data["tags"];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

        // foreach ($tags as $tag) {
        // PostTag::firstOrCreate([
        //     'tag_id' => $tag,
        //     'post_id'=> $post->id,
        // ]);
        // }

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "likes" => "string",
            "category_id" => "string",
            "tags" => "",
        ]);

        $tags = $data["tags"];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);

    }

    public function destroy(Post $post)
    {
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
