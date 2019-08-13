@extends('layouts.app')

@section('title')
    Miniblog - {{ $profileUser->name }}!
@endsection

@section('content')

    <div class="container">

        @can ('update', $profileUser)
            <form method="POST" action="/users/{{ $profileUser->id }}/avatar" enctype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column align-items-center">
                    <input name="avatar" type="file" class="file mb-2 col-sm-2">
                    <button type="submit" class="btn btn-success">Add Profile Image</button>
                </div>
            </form>
        @endcan
        <img src="{{ $profileUser->avatar_path }}" alt="user-profile-image" class="img-thumbnail">

        <h1>{{ $profileUser->name }}</h1>
        <small>
            Created {{ $profileUser->created_at->diffForHumans() }}
        </small>
        <hr>
    </div>
    <div class="container">
        @foreach ($posts as $post)
            <div class="card text-left mb-2">
                <div class="card-header bg-secondary">
                    <div class="container links text-light d-flex">
                        <a class="mr-1" href="/posts/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                        <small class="name-links text-light align-self-center">
                            created by
                            <a href="/profiles/{{ $post->owner->id }}">
                                {{ $post->owner->name }}
                            </a>
                        </small>
                        <small class="ml-auto">
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
        {{ $posts->links() }}
    </div>

@endsection
