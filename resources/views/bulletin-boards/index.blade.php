@extends('layout.bulletin-board-common')
@section('title', 'Study-Of-PostSite 投稿一覧表')
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" >
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" media="screen and (max-width:750px)" >

<header class="navbar navbar-dark bg-primary">
    <a class="header-tag navbar-brand font-weight-bold " href="{{ url('/') }}">Study-Of-PostSite</a>
</header>

<p>
    <img src="{{ asset('/css/images/black-board.jpg') }}"id="black-board-image" alt="黒板">
    <p class="header-comment text-white font-weight-bold">投稿一覧表</p>
    <p class="header-text text-white font-weight-bold ">自分のプログラミング勉強を共有しよう!!</p>
</p>


@section('content')
{{--  以下のviewページを自由にカスタマイズ  --}}


{{--  新規投稿フォームと検索フォーム  --}}
<div class="mt-3 d-flex justify-content-sm-around" >
    <a href="{{ route('bulletin-board.create') }}"  class="create-btn">投稿の新規作成はこちらです</a>
    <form class="form-inline" method="GET" action="{{ route('bulletin-board.index') }}">
        <input type="text" name="searchword" value="{{$searchword}}"  class="form-control mr-sm-2" placeholder="キーワードを入力">
        <button type="submit" class="search-box btn btn-info">検索</button>
    </form>
</div>


{{--  投稿が成功した場合のフラッシュメッセージ  --}}
@if (session('flash_message'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('flash_message') }}
    </div>
@endif


{{--  投稿した際の一覧を表示させる  --}}
@foreach ($posts as $post)
<div class="row no-gutters">
    <div class="card col-sm-7 mt-5 mx-auto border-dark">


        {{--  投稿者 日付 カテゴリー 件名を表示させる  --}}
        <div class="card-header h5 text-center bg-dark text-white d-flex justify-content-sm-around">
            <p class="name m-auto">投稿者 {{ $post->name }}さん</p>
            <p class="date m-auto">投稿日 {{ $post->created_at->format('Y.m.d') }}</p>
        </div>

        <div class="h5 card-header text-center">
            <p class="category m-auto">カテゴリー {{ $post->category }} </p>
        </div>

        <div class="h5 card-header text-center bg-white">
            <p class="category m-auto">件名 {{ $post->subject }} </p>
        </div>


        {{--  続きを読むための詳細ボタン  --}}
        <div class="card-body">

            <p class="card-text message left">
                {!! nl2br(e(Str::limit($post->message, 180))) !!}
                <a href="{{ route('bulletin-board.show', $post) }}" id="continued-btn" class="btn btn-primary">続きを読む</a>
            </p>


            {{--  コメントの投稿がある場合の表示  --}}
            @if ($post->comments->count() >= 1)
            <p>
                <span class="badge badge-primary">
                現在のコメント数　{{ $post->comments->count() }}件
                </span>
            </p>
            @endif

        </div>

        {{--  投稿の編集 削除  --}}
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


{{--  検索ページ  --}}
<div class="d-flex justify-content-center mt-3">
    {{ $posts->appends(['searchword' => $searchword])->links() }}
</div>

{{--  フッター  --}}
@include('layout.bulletin-board-footer')