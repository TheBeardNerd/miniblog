@extends('layouts.app')

@section('title')
    Miniblog - {{ $post-> title }}
@endsection

@section('content')
<div class="container">
    <div class="card text-left">
        <div class="card-header bg-secondary text-light d-flex">
            <h3 class="mb-n1">{{ $post->title }}</h3>
            <span class="ml-auto">
                <form method="POST" action="/posts/{{ $post->id }}">
                    @method('DELETE')
                    @csrf
                    <span class="form-group text-left">
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times fa-lg"></i></button>
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
                    <a href="/posts/{{ $post->id }}/edit" role="button" class="btn btn-sm links submit">
                        Edit Post
                    </a>
                </span>
            </div>
            @if ($post->comments->count())
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
                        <div class="container">
                            @include('errors')
                            @foreach ($post->comments as $comment)
                                <div class="card mb-2">
                                    <div class="card-body d-flex">
                                        {{ $comment->comment }}
                                        {{-- <span class="ml-auto">
                                            <form method="POST" action="">
                                                @method('DELETE')
                                                @csrf
                                                <span class="form-group text-left">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times fa-lg"></i></button>
                                                </span>
                                            </form>
                                        </span> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
