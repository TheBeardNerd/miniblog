@extends('layouts.app')

@section('title')
    Edit Post - {{ $post-> title }}
@endsection

@section('content')
<div class="container">
    <div class="card text-left">
        <div class="card-header bg-secondary text-light d-flex">
            <h3 class="mb-n1">Edit Post</h3>
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
            @include('errors')
            <form method="POST" action="/posts/{{ $post->id }}">

                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control form-control-lg" type="text" name="title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <label for="post">Post:</label>
                    <textarea class="form-control form-control-lg" name="post" required>{{ $post->post }}</textarea>
                </div>
                <span>
                    <a href="/posts/{{ $post->id }}" role="button" class="btn btn-sm btn-secondary mr-2">
                        <i class="fas fa-arrow-left fa-lg"></i>
                    </a>
                </span>
                <span class="form-group text-left">
                    <button type="submit" class="btn btn-sm submit">Save Post</button>
                </span>
            </form>
        </div>
    </div>
</div>
@endsection
