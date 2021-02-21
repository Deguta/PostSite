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
        <h1 class="h4 mb-4">
            {{ $post->subject }}
        </h1>

        <!-- 投稿情報 -->
        <div class="summary">
            <p><span>{{ $post->name }}</span> / <time>{{ $post->updated_at->format('Y.m.d H:i') }}</time> / {{ optional($post->category)->name }} / {{ $post->id }}</p>
        </div>

        <!-- 本文 -->
        <p class="mb-5">
            {!! nl2br(e($post->message)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>
 
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
    </div>
</div>
@endsection

@include('layout.bulletin-board-footer')