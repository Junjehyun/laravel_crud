<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('content')
<!-- mb-5를 넣어주면서 요소의 아래쪽에 마진이 추가되어 여백이 생기게 됨. 가독성을 위해. -->
<div class="container text-center mb-5">
    <h2 class="mb-5">게시판</h2>
</div>

@php
    $startNumber = $posts->total() - (($posts->currentPage() -1) * $posts->perPage())
@endphp

    {{--$posts 배열에서 각각의 게시물에 대해 반복한다. $index 변수는 배열의 현재 인덱스를 나타냄.--}}

    <!-- 게시물 렌더링 부분은 그대로 유지 -->
    @foreach ($posts as $index => $post)

    <!-- d-flex와 justify-content-between 클래스 추가하여 요소들을 가로로 정렬하고 간격을 벌림 -->
    <div class="mb-1 d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('posts.show', $post )}}"
            style="color: inherit; text-decoration: none;">
            {{-- 게시글 번호와 타이틀 표시! --}}
            <h5 class="mb-2">{{  $startNumber-- }}. {{ $post->title }}</h5>
            </a>
            {{-- 게시글 내용 표시! but 표시 안하기로. 주석처리함.--}}
            {{-- <p>{{ $post->content }}</p> --}}
        </div>

        <div>
            <div class="d-inline-block"> <!--상세보기, 수정, 삭제버튼 다 한줄에 배치-->
            <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">
                View</a>
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">
                Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('정말 삭제하시겠습니까?')">
                    Delete</button>
                </form>
            </div>
        {{-- 게시물이 생성된 날짜와 시간을 표시! --}}
        <small class="text-black-50">{{ \Carbon\Carbon::parse($post->created_at)->format('Y.m.d H:i:s') }}</small>

        </div>
    </div>

    <!--게시글 간격으로 라인을 그어주는 태그다. 게시글 간의 구분을 시각적으로 표현하고 싶어서 넣음.-->
        <hr style=" margin-top:10px; margin-bottom:10px;">
    @endforeach

<div class="d-flex justify-content-center align-items-center">
    {{-- 페이지네이션 --}}
    <div class="pagination">
        {{ $posts->links() }}
    </div>
</div>

<div class="d-flex justify-content-end">
    <div class="newArticle ml-auto">
        <a href="{{ route('posts.create') }}" class="btn btn-success">New Article</a>
    </div>
</div>

@endsection
