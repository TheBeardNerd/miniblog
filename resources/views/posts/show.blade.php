@extends('layouts.app')

@section('title')
    Miniblog - {{ $post-> title }}
@endsection

@section('content')
<div class="container">
    <div class="card text-left">
        <div class="card-header bg-secondary d-flex">
            <div>
                <div class="d-flex">
                    <a href="/profiles/{{ $post->owner->id }}">
                        <img src="/storage/{{ $post->owner->avatar_path }}" alt="{{ $post->owner->name }}"
                            class="avatar mr-2" width="30" height="30" />
                    </a>
                    <h3 class="title mb-n1">{{ $post->title }}</h3>
                </div>
                <small class="text-light name-links">
                    Posted by
                    <a href="/profiles/{{ $post->owner->id }}">
                        {{ $post->owner->name }}
                    </a>
                    {{ $post->created_at->diffForHumans() }}
                </small>
            </div>
            <span class="ml-auto mt-2">
                <form method="POST" action="/posts/{{ $post->id }}">
                    @method('DELETE')
                    @csrf
                    <span class="form-group text-left">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt fa-lg"></i></i></button>
                    </span>
                </form>
            </span>
        </div>
        <div class="card-body">
            <div class="container">
                <blockquote class="blockquote">{{ $post->post }}</blockquote>
            </div>
            <div class="d-flex mb-n3">
                <span>
                    <a href="/" role="button" class="btn btn-sm btn-secondary mr-2">
                        <i class="fas fa-arrow-left fa-lg"></i>
                    </a>
                </span>
                <span class="form-group mr-2">
                    <a href="/posts/{{ $post->id }}/edit" role="button" class="btn btn-sm btn-success">
                        Edit Post
                    </a>
                </span>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <!-- write a new comment form -->
                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" placeholder="Add a comment...">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" id="comment"><i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @include('errors')
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment)
                            <div class="card mb-2">
                                <div class="card-header bg-secondary text-light d-flex">
                                    <small class="name-links text-light pt-1">
                                        Posted by
                                        <a href="/profiles/{{ $comment->owner->id }}">
                                            {{ $comment->owner->name }}
                                        </a>
                                        {{ $comment->created_at->diffForHumans() }}
                                    </small>
                                    <span class="ml-auto">
                                        <form method="POST" action="/comments/{{ $comment->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <span class="form-group text-left">
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt fa-sm"></i></button>
                                            </span>
                                        </form>
                                    </span>
                                </div>
                                <div class="card-body d-flex">
                                    <div class="container">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
