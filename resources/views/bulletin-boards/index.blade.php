@extends('layout.bulletin-board-common')
 
@section('title', 'PostSite 投稿一覧表')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿一覧ページの説明文')
@section('pageCss')
<link href="/css/bulletin-board/sticky-footer.css" rel="stylesheet">
<link href="/css/bulletin-board/index-list.css" rel="stylesheet">

@endsection
 
@include('layout.bulletin-board-header')
 
@section('content')
<div class="mt-4 mb-4">
    <a href="{{ route('bulletin-board.create') }}"  class="create-btn m-auto">投稿の新規作成はこちらです</a>
</div>

@if (session('flash_message'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('flash_message') }}
    </div>
@endif

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