@extends('layouts.app')

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
            <form method="POST" action="/posts/{{ $post->id }}">

                @method('PATCH')
                @csrf

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="title" placeholder="Title" value="{{ $post->title }}" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="post" placeholder="Post" required>{{ $post->post }}</textarea>
                </div>
                <span>
                    <button class="btn btn-sm btn-secondary" type="button">
                        <a href="/posts/{{ $post->id }}" class="text-decoration-none text-white">
                            <i class="fas fa-arrow-left fa-lg"></i>
                        </a>
                    </button>
                </span>
                <span class="form-group text-left">
                    <button type="submit" class="btn btn-sm submit">Save Post</button>
                </span>
            </form>
        </div>
    </div>
</div>
@endsection
