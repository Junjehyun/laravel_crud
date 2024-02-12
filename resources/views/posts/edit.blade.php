<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
    <div class="card-header">글 수정</div>

    <div class=card-body>
    <!-- 게시글 수정 폼 -->
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
        <label for="title">제목:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}"
        class="form-control" required>
        </div>

        <div class="form-group">
        <label for="content">내용:</label>
        <textarea id="content" name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">수정하기</button>

    </form>
</div>
    <div class="card-footer" style="text-align: center;">

        <a href="{{ route('posts.index') }}" class="btn btn-info">돌아가기</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
