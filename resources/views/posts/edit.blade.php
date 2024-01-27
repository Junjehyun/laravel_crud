<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>글 수정</h2>

    <!-- 게시글 수정 폼 -->
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">제목:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>

        <label for="content">내용:</label>
        <textarea id="content" name="content" required>{{ $post->content }}</textarea>

        <button type="submit">수정하기</button>
    </form>

    <a href="{{ route('posts.index') }}">뒤로 가기</a>
@endsection
