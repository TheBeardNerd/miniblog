@extends('layouts.app')

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
            <blockquote class="blockquote">{{ $post->post }}</blockquote>
            <div class="d-flex mb-n3">
                <span>
                    <a href="/posts" role="button" class="btn btn-sm btn-secondary mr-2">
                        <i class="fas fa-arrow-left fa-lg"></i>
                    </a>
                </span>
                <span class="form-group mr-2">
                    <a href="/posts/{{ $post->id }}/edit" role="button" class="btn btn-sm links submit">
                        Edit Post
                    </a>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
