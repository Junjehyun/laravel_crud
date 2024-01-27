<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>새 글 작성</h2>

    <!-- 게시글 작성 폼 -->
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="title">제목</label>
        <input type="text" id="title" name="title" required>

        <label for="content">내용</label>
        <textarea id="content" name="content" required></textarea>

        <button type="submit">작성하기</button>
    </form>

    <a href="{{ route('posts.index') }}">뒤로 가기</a>
@endsection
