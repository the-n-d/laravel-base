@extends('layouts.main')

@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                    value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" class="form-control" id="content" placeholder="Content"
                    value="{{ $post->content }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                    value="{{ $post->image }}">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option {{ $post->category->id === $category->id ? "selected" : "" }} value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" multiple name="tags[]" id="tags">
                    @foreach ($tags as $tag)
                        <option 
                        @foreach ($post->tags as $postTag)
                        {{ $postTag->id === $tag->id ? "selected" : "" }}
                        @endforeach 
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection