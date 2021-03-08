@extends('layout.bulletin-board-common')
@section('title', 'Study-Of-PostSite 投稿一覧表')
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" >
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" media="screen and (max-width:750px)" >

<header class="navbar navbar-dark bg-primary">
    <a class="header-tag navbar-brand font-weight-bold " href="{{ url('/') }}">Study-Of-PostSite</a>
</header>
<p><img src="{{ asset('/css/images/black-board.jpg') }}"id="black-board-image" alt="黒板">
    <p class="header-comment text-white font-weight-bold">投稿一覧表</p>
    <p class="header-text text-white font-weight-bold ">自分のプログラミング勉強を共有しよう!!</p>
</p>



@section('content')

<div class="mt-3 d-flex justify-content-sm-around" >
    <a href="{{ route('bulletin-board.create') }}"  class="create-btn">投稿の新規作成はこちらです</a>
    <form class="form-inline" method="GET" action="{{ route('bulletin-board.index') }}">
        <input type="text" name="searchword" value="{{$searchword}}"  class="form-control mr-sm-2"  aria-label="searchword" placeholder="キーワードを入力">
        <button type="submit" class="search-box btn btn-info">検索</button>
    </form>
</div>

@if (session('flash_message'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('flash_message') }}
    </div>
@endif

@foreach ($posts as $post)
<div class="row no-gutters">
    <div class="card col-sm-7 mt-5 mx-auto border-dark">
        <div class="h2 card-header text-center bg-dark text-white d-flex justify-content-sm-around">
            <p  class="name mt-0 mb-0">投稿者　{{ $post->name }}  さん
                <p class="date h6 mt-2"> 投稿日　{{ $post->created_at->format('Y.m.d') }}</p>
            </p>
        </div>
        <div class="h5 card-header text-center back-color-gradient">
            <section>カテゴリー　{{ $post->category }} </section>
        </div>
        <div class="card-body">
            <div class="h5 border-bottom border-dark pb-2 text-center">
                <section class="subject">タイトル　{{ $post->subject }} </section>
            </div>

            <p class="card-text left">
                {!! nl2br(e(Str::limit($post->message, 180))) !!}
                <a href="{{ route('bulletin-board.show', $post) }}" class="btn btn-primary ">続きを読む</a>
            </p>
            @if ($post->comments->count() >= 1)
            <p>
                <span class="badge badge-primary">
                現在のコメント数　{{ $post->comments->count() }}件
                </span>
            </p>
            @endif
        </div>
        <div class="card-footer d-inline-block d-flex justify-content-sm-center pb-0">
            <p><a href="{{ action('PostsController@edit', $post) }}" class="btn btn-info btn-sm  mr-5">編集する</a></p>
                <form method="POST" action="{{ route('bulletin-board.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm ">削除する</button>
                </form>
            </p>
        </div>
    </div>
</div>
@endforeach

<div class="d-flex justify-content-center mt-3">
    {{ $posts->appends(['searchword' => $searchword])->links() }}
</div>

@include('layout.bulletin-board-footer')