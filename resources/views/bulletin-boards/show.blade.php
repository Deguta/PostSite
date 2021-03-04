@extends('layout.bulletin-board-common')
@section('title', '投稿の詳細ページ')
<link href="/css/bulletin-board/show.css" rel="stylesheet">
<link href="{{ asset('bulletin-board/show.css') }}" rel="stylesheet">
<header>
          @component('components.header')
            @slot('header')
            @endslot
          @endcomponent
</header>
@section('content')


<div class="container mt-4">
    <div class="border p-4">

        <table class="table table-hover table-striped w-75 mx-auto">
            <thead>
                <td class="w-50 text-center font-weight-bold">投稿者</td>
                <td class="w-50 text-center">{{ $post->name }} さん</td>
            </thead>

            <tbody>
                <tr>
                    <td class="text-center font-weight-bold">カテゴリー</td>
                    <td class="text-center">{{ $post->category }}</td>
                </tr>
                <tr>
                    <td class="text-center font-weight-bold">件名</td>
                    <td class="text-center">{{ $post->subject }}</td>
                </tr>
            </tbody>
        </table>

        <div class="post-show">投稿内容
            <p class="font-weight-normal">{!! nl2br(e($post->message)) !!}</p>
        </div>


        <section>
            <h2 class="h5 mb-4 mt-5">コメント一覧になります</h2>

            @forelse($post->comments as $comment)
                <div class="border-top p-4 mt-2 ">
                    <time class="text-secondary">
                        {{ $comment->name }} 
                        {{ $comment->created_at->format('Y.m.d H:i') }} 
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
                            {{--    post_idは外部キーになります。post_idはコメント投稿したら自動で付随されるのでtype="hidden"にしている。勝手にユーザーが変更できない様にしている。  --}}
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