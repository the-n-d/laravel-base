@extends('layouts.main')

@section('content')
    <div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" value="{{ old('content') }}" class="form-control" id="content" placeholder="Content">
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" name="image" value="{{ old('image') }}" class="form-control" id="image" placeholder="Image">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category_id">
                    @foreach ($categories as $category)
                        <option {{ old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select class="form-select" multiple name="tags[]" id="tags">
                    @foreach ($tags as $tag)
                        <option  value="{{ $tag->id }}">{{ $tag->title }}</option>''
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>
@endsection