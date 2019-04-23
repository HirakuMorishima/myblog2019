@extends('layouts.default')

@section('title', $post->title)

@section('content')
        <p class="header-menu"><a href="/">Back</a></p>
        <h1>{{ $post->title }}</h1>
        <p>{!! nl2br(e($post->body)) !!}</p>
        <h2>Comments</h2>
        <ul>
            @forelse ($post->comments as $comment)
            <li>{{ $comment->body }}
            <a href="#" data-id="{{ $comment->id }}" class="del">[ DELETE ]</a></li>
            <form method="post" action="{{ action('CommentsController@destroy', [$post,$comment] ) }}" id="form_{{ $comment->id }}">
              {{ csrf_field() }}
              {{ method_field('delete') }}
            </form>
            @empty
            No Post yet
            @endforelse
        </ul>
        <form action="{{ action('CommentsController@store', $post) }}" method="post">
        {{ csrf_field() }}
        <p>
        <input type="text" name="body" placeholder="enter Comments" value="{{ old('body') }}">
        </p>
        <p>
        <input type="submit" value="Add Comments">
        </p>
        </form>
        <script src="/js/main.js"></script>
@endsection