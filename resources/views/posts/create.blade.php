@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-left list-unstyled" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
        </div>
    @endif
    <div class="card text-left">
        <div class="card-header bg-secondary text-light">
            <h3 class="mb-n1">Create Post</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/posts">

                @csrf

                <div class="form-group">
                    <input class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" placeholder="Title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg {{ $errors->has('title') ? 'is-invalid' : '' }}" name="post" placeholder="Post">{{ old('post') }}</textarea>
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
