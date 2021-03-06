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

<div class="mt-4 mb-4 d-flex justify-content-between" >
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
    <div class="card col-md-8 mt-5 mx-auto">
        <div class="h2 card-header text-center back-color-gradient d-flex justify-content-lg-around">
            <p >投稿者  {{ $post->name }}  さん
                <p class="h5 mt-2"> 投稿日  {{ $post->created_at->format('Y.m.d') }}</p>
            </p>
        </div>
        <div class="h4 card-header text-center back-color-gradient">
          <section>カテゴリー  {{ $post->category }} </section>
        </div>
        <div class="h4 card-header text-center back-color-gradient">
          <section>タイトル {{ $post->subject }} </section>
        </div>
        <div class="card-body">
            
            <p class="card-text left">
                {!! nl2br(e(Str::limit($post->message, 128))) !!}
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
        <div class="card-footer d-inline-block d-flex justify-content-between">
                <!-- <p><a href="{{ route('bulletin-board.show', $post) }}" class="btn btn-primary btn-sm">詳細</a></p> -->
                <p><a href="{{ action('PostsController@edit', $post) }}" class="btn btn-info btn-sm">編集</a></p>
            
                <form method="POST" action="{{ route('bulletin-board.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">削除</button>
                </form>
                </p>

        </div>
    </div>
    
</div>
@endforeach




<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>カテゴリ</th>
                <th>作成日時</th>
                <th>名前</th>
                <th>件名</th>
                <th>メッセージ</th>
                <th>処理</th>
            </tr>
        </thead>

        <tbody id="tbl">
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->created_at->format('Y.m.d') }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->subject }}</td>
                    <td>{!! nl2br(e(Str::limit($post->message, 100))) !!}
                    @if ($post->comments->count() >= 1)
                        <p><span class="badge badge-primary">
                        現在のコメント数は{{ $post->comments->count() }}件
                        </span></p> //countでコメントが何件あるか表示できる
                    @endif
                    </td>
                    <td class="text-nowrap">
                        <p><a href="{{ route('bulletin-board.show', $post) }}" class="btn btn-primary btn-sm">詳細</a></p>
                        <p><a href="{{ action('PostsController@edit', $post) }}" class="btn btn-info btn-sm">編集</a></p>
                        <p>
                            <form method="POST" action="{{ route('bulletin-board.destroy', $post->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">削除</button>
                            </form>
                        </p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center mb-5">
        {{ $posts->appends(['searchword' => $searchword])->links() }}
    </div>
</div>  
@endsection
 
@include('layout.bulletin-board-footer')