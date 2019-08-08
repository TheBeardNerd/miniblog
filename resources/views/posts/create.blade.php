@extends('layouts.app')

@section('title')
    Create Post
@endsection

@section('content')
<div class="container">
    <div class="card text-left">
        <div class="card-header bg-secondary text-light">
            <h3 class="mb-n1">Create Post</h3>
        </div>
        <div class="card-body">
            @include('errors')
            <form method="POST" action="/posts">

                @csrf

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                    <label for="post">Post:</label>
                    <textarea class="form-control form-control-lg {{ $errors->has('post') ? 'is-invalid' : '' }}" name="post">{{ old('post') }}</textarea>
                </div>
                <div class="d-flex">
                    <span>
                        <a href="/posts" role="button" class="btn btn-sm btn-secondary mr-2">
                            <i class="fas fa-arrow-left fa-lg"></i>
                        </a>
                    </span>
                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-sm btn-success">Create Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
