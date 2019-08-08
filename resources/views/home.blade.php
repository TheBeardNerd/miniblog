@extends('layouts.app')

@section('title')
    Miniblog - Success!
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-light">
                    <h3 class="mb-n1">Success!</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div class="my-4">
                        <a href="/posts" role="button" class="btn btn-success">
                            See the latest posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
