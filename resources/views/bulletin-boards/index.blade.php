@extends('layout.bulletin-board-common')
@section('title', 'Study-Of-PostSite 投稿一覧表')
<link href="/css/bulletin-board/sticky-footer.css" rel="stylesheet">
<link href="/css/bulletin-board/index-list.css" rel="stylesheet">
<header class="navbar navbar-dark  navbar-expand-sm bg-primary ">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">Study-Of-PostSite</a>
    </div>
</header>
<p class="header-image">
    <img src="{{ asset('/css/images/black-board.jpg') }}" id="black-board-image" alt="黒板">
</p>

@section('content')

<div class="mt-4 mb-4 d-flex justify-content-md-around" >
    <a href="{{ route('bulletin-board.create') }}"  class="create-btn">投稿の新規作成はこちらです</a>
    <form class="form-inline " method="GET" action="{{ route('bulletin-board.index') }}">
        <input type="text" name="searchword" value="{{$searchword}}"  class="form-control mr-sm-2"  aria-label="searchword" placeholder="キーワードを入力">
        <button type="submit" class="btn btn-info">検索</button>
    </form>
</div>

@if (session('flash_message'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('flash_message') }}
    </div>
@endif

@foreach ($posts as $post)
<div class="row no-gutters">
    <div class="card col-md-7 mt-3 mx-auto border-dark">
        <div class="h2 card-header text-center bg-dark text-white d-flex justify-content-md-around">
            <p  class="mt-0 mb-0">投稿者　{{ $post->name }}  さん
                <p class="h6 mt-2"> 投稿日　{{ $post->created_at->format('Y.m.d') }}</p>
            </p>
        </div>
        <div class="h5 card-header text-center back-color-gradient">
          <section>カテゴリー　{{ $post->category }} </section>
        </div>
        <div class="card-body">
            <div class="h5 border-bottom border-dark pb-2 text-center">
                <section>タイトル　{{ $post->subject }} </section>
              </div>
      
            
            <p class="card-text left">
                {!! nl2br(e(Str::limit($post->message, 120))) !!}
                <a href="{{ route('bulletin-board.show', $post) }}" class="btn btn-primary ">続きを読む</a>
            </p>
            @if ($post->comments->count() >= 1)
            <p>
                <span class="badge badge-primary">
                現在のコメント数は{{ $post->comments->count() }}件
                </span>
            </p>
            @endif

        </div>
        <div class="card-footer d-inline-block d-flex justify-content-md-center pb-0">
                <!-- <p><a href="{{ route('bulletin-board.show', $post) }}" class="btn btn-primary btn-sm ml-5">詳細</a></p> -->
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
</div>

@include('layout.bulletin-board-footer')