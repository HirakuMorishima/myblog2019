@extends('layouts.default')

@section('title', 'New Post')

@section('content')
        <p class="header-menu"><a href="/">Back</a></p>
        <h1>New Post</h1>
        
        <form action="{{ url('/posts') }}" method="post">
        {{ csrf_field() }}
        @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif
        
        <p>
        <input type="text" name="title" placeholder="enter name" value="{{ old('title') }}">
        </p>
        <p>
        <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>  
        </p>
        <p>
        <input type="submit" value="Add">
        </p>
        </form>
@endsection