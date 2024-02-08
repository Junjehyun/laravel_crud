<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
<!-- mb-5를 넣어주면서 요소의 아래쪽에 마진이 추가되어 여백이 생기게 됨. 가독성을 위해. -->
<div class="container text-center mb-5">
    <h2 class="mb-5">Todo List Free-Board</h2>
</div>

    @foreach ($posts as $post)
    <!-- d-flex와 justify-content-between 클래스 추가하여 요소들을 가로로 정렬하고 간격을 벌림 -->
    <div class="mb-1 d-flex justify-content-between align-items-center">

        <div>
            {{-- 게시글 타이틀 표시! --}}
            <h3 class="mb-3">{{ $post->title }}</h3>
            {{-- 게시글 내용 표시! --}}
            <p>{{ $post->content }}</p>
        </div>

        <div>
            <div class="d-inline-block"> <!--상세보기, 수정, 삭제버튼 다 한줄에 배치-->
            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">
                상세보기</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
                수정</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('정말 삭제하시겠습니까?')">삭제</button>
                </form>
            </div>
        {{-- 게시물이 생성된 날짜와 시간을 표시! --}}
        <small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->format('Y년m월d일 H시i분s초') }}</small>

        {{-- 원래 날짜 시간표시 일단 주석처리.. --}}
        {{-- <small class="text-muted">{{ $post->created_at }}</small> --}}
        </div>

    </div>

    <!--게시글 간격으로 라인을 그어주는 태그다. 게시글 간의 구분을 시각적으로 표현하고 싶어서 넣음.-->
        <hr>
    @endforeach

    {{ $posts->links() }} <!-- 페이지네이션 링크 출력 -->

    <a href="{{ route('posts.create') }}" class="btn btn-success">NEW</a>

@endsection
