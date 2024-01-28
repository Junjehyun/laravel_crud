<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>List</h2>

    @foreach ($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
            <small>{{ $post->created_at }}</small>
            <a href="{{ route('posts.show', $post) }}">상세보기</a>
            <a href="{{ route('posts.edit', $post) }}">수정</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">삭제</button>
            </form>
        </div>
        <hr>
    @endforeach

    {{ $posts->links() }} <!-- 페이지네이션 링크 출력 -->

    <a href="{{ route('posts.create') }}">NEW</a>
@endsection
