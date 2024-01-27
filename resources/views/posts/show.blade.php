<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
    <small>{{ $post->created_at }}</small>
    <br>
    <a href="{{ route('posts.edit', $post) }}">수정</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">삭제</button>
    </form>
    <br>
    <a href="{{ route('posts.index') }}">뒤로 가기</a>
@endsection
