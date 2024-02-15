<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// web.php 주소창 설정해서 모아두는곳 spring의 컨트롤러 부분


// 기본 경로 ('/')에 접속하면 'welcome' 뷰를 반환하는 라우트.
// 첨에 프로젝트 만들면 기본으로 하나 딸려있는 놈이다.
Route::get('/', function () {
    return view('welcome');
});

// 모든 게시글 목록을 보여주는 페이지에 접속하기 위한 라우트.
// get요청이 '/posts' 경로로 오면 'PostController'의 'index' 메소드를 호출하여, 게시글 목록을 보여주는
// 페이지로 이동한다. 이 라우트에는 'posts.index'라는 이름이 지정되어 있어 나중에 이름을 이용하여,
// URL을 생성할 수 있다. 걍 한마디로 메인 페이지다. 이게
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// 새로운 글을 작성하는 페이지
// get요청이 'posts/create'경로로 오면 'PostController'의 'create' 메소드를 호출하여,
// 게시글을 작성하는 페이지로 이동하게 되는것이다. 메인페이지에서 NEW 버튼을 눌리면 여기로 이동이 됨.
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// 새로 작성한 게시글을 저장하는 라우트.
// 'post'요청이 '/posts' 경로로 오면 'PostController'의 'store' 메소드를 호출하여
// 새로 작성한 게시글을 저장하고, 이후에는 저장된 게시글을 보여주는 페이지로 리다이렉션한다.
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// 특정 게시글을 보여주는 페이지다.
// Get요청이 '/posts/{post}' 경로로 오면 'PostController'의 'show'메서드를 호출하여,
// 특정 ID의 게시글을 보여주는 페이지로 이동한다. '{post}'는 변수처럼 동작하여, 어떤 게시글을 보여줄지 결정.
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// 특정 게시글을 수정하는 페이지에 접속하기 위한 라우트
// get요청이 '/posts/{post}/edit'경로로 오면 PostController의 edit 메소드를 호출하여, 특정 ID의
// 게시글을 수정하는 페이지로 이동한다.
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// 수정한 내용을 저장하기 위한 라우트
// PUT요청이 '/posts/{post}'경로로 오면 PostController의 update 메소드를 호출하여, 특정 ID의 게시글을
// 업데이트 하고, 이 후에는 업데이트한 게시글을 보여주는 페이지로 리다이렉션 한다.
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// 게시글을 삭제하는 라우트다.
// DELETE 요청이 '/posts/{post}' 경로로 오면 PostController의 destroy 메서드를 호출하여,
// 특정 ID의 게시글을 삭제한다. '{post}'는 삭제할 게시글의 ID를 나타낸다. 이 라우트에는 'posts.destroy'
// 라는 이름이 지정되어 있어 나중에 이름을 이용하여 URL을 생성할 수 있다.
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// 검색을 처리하는 라우트를 정의함.
// 검색어를 받아 검색을 수행하는 컨트롤러의 메서드로 요청을 보내야한다.
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');
