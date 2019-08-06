@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body mt-2">
            @foreach ($posts as $post)
                <div class="card text-left mb-2">
                    <div class="card-header pt-3">
                        <h4>{{ $post->title }}</h4>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote">{{ $post->post }}</blockquote>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
