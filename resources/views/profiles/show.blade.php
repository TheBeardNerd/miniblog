@extends('layouts.app')

@section('title')
    Miniblog - {{ $profileUser->name }}!
@endsection

@section('content')

    <div class="container">

        <avatar-form :user="{{ $profileUser }}"></avatar-form>

    </div>
    <div class="container">
        @foreach ($posts as $post)
            <div class="card text-left mb-2">
                <div class="card-header bg-secondary">
                    <div class="links text-light d-flex">
                        <a href="/profiles/{{ $post->owner->id }}">
                            <img src="/storage/{{ $post->owner->avatar_path }}" alt="{{ $post->owner->name }}"
                                class="avatar mr-2" width="30" height="30" />
                        </a>
                        <a class="mr-1 mt-1" href="/posts/{{ $post->id }}">
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
