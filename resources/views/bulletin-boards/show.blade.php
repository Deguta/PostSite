@extends('layout.bulletin-board-common')
 
@section('title', 'PostSite 投稿一覧表')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿一覧ページの説明文')
@section('pageCss')
<link href="/css/bbs/style.css" rel="stylesheet">
@endsection
 
@include('layout.bulletin-board-header')
 
@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <!-- 件名 -->
        <h1 class="h4 mb-4">{{ $post->subject }}</h1>

        <!-- 投稿情報 -->
        <div class="summary">
            <p>
                <span>{{ $post->name }}</span>
                <time>{{ $post->updated_at->format('Y.m.d H:i') }}</time>
                {{--  {{ $post->category->name }}  --}}
                {{ $post->id }}
            </p>
        </div>

        <!-- 本文 -->
        <p class="mb-5">
            {!! nl2br(e($post->message)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">コメント</h2>
 
            @forelse($post->comments as $comment)
                <div class="border-top p-4">
                    <time class="text-secondary">
                        {{ $comment->name }} /
                        {{ $comment->created_at->format('Y.m.d H:i') }} /
                        {{ $comment->id }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($comment->comment)) !!}
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
        </section>
        <form class="mb-4" method="POST" action="{{ route('comment.store') }}">
            @csrf

            <input name="post_id" type="hidden" value="{{ $post->id }}">

            <div class="form-group">
                <label for="subject">名前</label>
                <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" type="text">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
            </div>

            <div class="form-group">
                <label for="body">本文</label>

                <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
                    @if ($errors->has('comment'))
                        <div class="invalid-feedback">
                            {{ $errors->first('comment') }}
                        </div>
                    @endif
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">コメントする</button>
            </div>
        </form>

        @if (session('commentstatus'))
            <div class="alert alert-success mt-4 mb-4">
                {{ session('commentstatus') }}
            </div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-info">編集する</a>

            <form style="display: inline-block;" method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">削除する</button>
            </form>
        </div>
    </div>
</div>
@endsection

@include('layout.bulletin-board-footer')