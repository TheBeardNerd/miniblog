@extends('layouts.app')

@section('title')
    Miniblog
@endsection

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="card text-left mb-2">
            <div class="card-header bg-secondary">
                <div class="container links">
                    <a class="text-light" href="/posts/{{ $post->id }}">
                        <h3 class="mb-n1">{{ $post->title }}</h3>
                    </a>
                    <small class="name-links text-light">
                        Posted by
                        <a href="/profiles/{{ $post->owner->id }}">
                            {{ $post->owner->name }}
                        </a>
                        {{ $post->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <blockquote class="blockquote mb-n1">{{ $post->post }}</blockquote>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
