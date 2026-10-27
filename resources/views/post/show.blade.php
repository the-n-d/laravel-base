@extends('layouts.main')

@section('content')
    <div>

        <div>
            {{ $post->id }}. {{ $post->title }}
        </div>
        <div>
            {{ $post->image }}
        </div>
        <div>
            {{ $post->content }}
        </div>

    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
    </div>
    <div>
    <form action="{{ route('post.destroy', $post->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <div>
        <a class="btn btn-secondary" href="{{ route('post.index') }}">Back</a>
    </div>
@endsection