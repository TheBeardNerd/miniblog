@extends('layouts.app')

@section('title')
    Miniblog
@endsection

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="card text-left mb-2">
            <div class="card-header bg-secondary">
                <div>
                    <div class="d-flex links">
                        <a href="/profiles/{{ $post->owner->id }}">
                            <img src="/storage/{{ $post->owner->avatar() }}" alt="{{ $post->owner->name }}"
                                class="avatar mr-2" width="30" height="30" />
                        </a>
                        <a class="mr-1" href="/posts/{{ $post->id }}">
                            <h3 class="title mb-n1">{{ $post->title }}</h3>
                        </a>
                    </div>
                    <small class="text-light name-links">
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
