@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
        <p class="header-menu"><a href="/">Back</a></p>
        <h1>Update Post</h1>
        
        <form action="{{ url('/posts', $post->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif
        
        <p>
        <input type="text" name="title" placeholder="enter name" value="{{ old('title', $post->title) }}">
        </p>
        <p>
        <textarea name="body" placeholder="enter body">{{ old('body' , $post->body) }}</textarea>  
        </p>
        <p>
        <input type="submit" value="Update">
        </p>
        </form>
@endsection