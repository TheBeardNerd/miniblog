@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <h1>Create Post</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="/posts">

                @csrf

                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="post" placeholder="Post"></textarea>
                </div>
                <div class="form-group text-left">
                    <button type="submit" class="btn btn-success">Create Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
