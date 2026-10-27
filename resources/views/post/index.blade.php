@extends('layouts.main')

@section('content')
    <div>
        <div class="mb-2">
            <a class="btn btn-primary" href="{{ route('post.create') }}">Create New</a>
        </div>
        @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}. {{ $post->title }}</a>
        </div>
        @endforeach
    </div>
@endsection