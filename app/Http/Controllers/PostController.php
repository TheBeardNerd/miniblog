<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Events\PostCreated;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {

        $validated = request()->validate([
            'title' => 'required|min:3|max:255',
            'post' => 'required|min:3|max:255'
        ]);

        $validated['owner_id'] = auth()->id();

        $post = Post::create($validated);

        event(new PostCreated($post));

        return redirect('/posts')
            ->with('flash', 'Your post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $validated = request()->validate([
            'title' => 'required|min:3|max:255',
            'post' => 'required|min:3|max:255'
        ]);

        $post->update($validated);

        return redirect('/posts')
            ->with('flash', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')
            ->with('flash', 'Your post has been deleted!');
    }
}
