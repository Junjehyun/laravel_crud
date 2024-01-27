<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    // Index 페이지
    public function index() {
        // 최신 게시글을 10개씩 페이지네이션하여 가져온다.
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // 게시글 작성 페이지
    public function create() {
        return view('posts.create');
    }

    // 게시글 저장
    public function store(Request $request) {
        //유효성 검사
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

         // 게시글 생성
    Post::create($validatedData);

    return redirect()->route('posts.index')->with('success', '게시글이 작성되었습니다.');

    }

    // 게시글 상세보기
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    // 게시글 수정 페이지
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    // 게시글 수정
    public function update(Request $request, Post $post) {
        //유효성 검사
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // 게시글 업데이트
        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', '게시글이 삭제되었습니다.');

    }
}