@extends('layouts.default')

@section('title', 'Blog Posts')

@section('content')
        <p class="header-menu"><a href="posts/create">New Post</a></p>
        <h1>Blog Post</h1>
        <ul>
            @forelse ($posts as $post)
            <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a>
            <a href="{{ action('PostsController@edit', $post) }}">[ EDIT ]</a>
            <a href="#" data-id="{{ $post->id }}" class="del">[ DELETE ]</a></li>
            <form method="post" action="{{ url('/posts', $post->id ) }}" id="form_{{ $post->id }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
            @empty
            No Post yet
            @endforelse
        </ul>
        <script src="/js/main.js"></script>
@endsection