@extends('layouts.app')

@section('title')
    Miniblog - {{ $profileUser->name }}!
@endsection

@section('content')

    <div class="container">

        <h1>{{ $profileUser->name }}</h1>

        <img src="/storage/{{ $profileUser->avatar() }}" alt="user-profile-image" width="100" height="100" class="avatar mb-2" />

        @can ('update', $profileUser)
            <form id="uploadAvatar" method="POST" action="/users/{{ $profileUser->id }}/avatar" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="input-group col-sm-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="avatarUpload" aria-describedby="avatarUploadAddOn">
                            <label class="file-input" for="avatarUpload">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="button" id="avatarUploadAddOn">Upload Avatar</button>
                        </div>
                    </div>
                </div>
            </form>
        @endcan
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
                        <small class="ml-auto mt-1">
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
