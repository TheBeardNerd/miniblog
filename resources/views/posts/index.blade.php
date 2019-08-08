@extends('layouts.app')

@section('title')
    Miniblog
@endsection

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="card text-left mb-2">
            <div class="card-header links bg-secondary">
                <a href="/posts/{{ $post->id }}">
                    <h3 class="mb-n1">{{ $post->title }}</h3>
                </a>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-n1">{{ $post->post }}</blockquote>
            </div>
        </div>
    @endforeach
</div>
@endsection
