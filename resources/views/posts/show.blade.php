<!-- resources/views/posts/show.blade.php -->
{{-- Layout을 가져옴<div class=""></div> --}}
@extends('layouts.app')

@section('content')
    <br>
    <br>
<div class="container text-center mb-5">
        <h2>{{ $post->title }}</h2>
    <hr>
        <p>{{ $post->content }}</p>

</div>
    <br>
    <br>
    <br>
    <br>
    <br>
<small class="text-black-50">{{ \Carbon\Carbon::parse($post->created_at)->format('Y.m.d H:i:s') }}</small>

<div style="display: flex; justify-content: flex-end;">
    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm" style="margin-right: 5px;">Edit</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="margin-right: 5px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm
        ('정말 삭제하시겠습니까?')">Delete</button>
    </form>
    <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">List</a>
</div>



@endsection
