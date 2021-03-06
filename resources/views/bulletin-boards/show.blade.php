@extends('layout.bulletin-board-common')
@section('title', '投稿の詳細ページ')
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/show.css') }}" >

<header>
        @component('components.header')
            @slot('header')
            @endslot
        @endcomponent
</header>


@section('content')

    {{--  投稿の詳細  --}}
    <div class="row no-gutters">

        <div class="card col-sm-8 mt-3 mx-auto border-dark">


            {{--  投稿者 投稿日  --}}
            <div class="card-header h5 text-center bg-dark text-white d-flex justify-content-sm-around">
                <p class="name m-auto">投稿者 {{ $post->name }}さん</p>
                <p class="date m-auto">投稿日 {{ $post->created_at->format('Y.m.d') }}</p>
            </div>


            {{--  カテゴリー  --}}
            <div class="h5 card-header text-center">
                <p class="category m-auto">カテゴリー {{ $post->category }} </p>
            </div>


            {{--  件名  --}}
            <div class="h5 card-header text-center bg-white">
                <p class="category m-auto">件名 {{ $post->subject }} </p>
            </div>


            {{--  本文  --}}
            <div class="card-body">
                <p class="card-text message left">
                    {{ $post->message }}
                </p>
            </div>

        </div>

    </div>


    {{--  コメントを投稿が成功したらフラッシュメッセージが出る  --}}
    @if (session('commentstatus'))
        <div class="alert alert-success mt-4 mb-4">
            {{ session('commentstatus') }}
        </div>
    @endif


    {{--  コメント一覧  --}}
    <section>

        <h2 class="h5 mb-5 mt-5">コメント一覧になります</h2>

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


        {{--  コメント投稿フォーム  --}}
        <input name="post_id" type="hidden" value="{{ $post->id }}">


        {{--  コメント投稿の名前入力フォーム  --}}
        <div class="form-group">
            <label for="subject">名前</label>
            <input id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}" type="text">
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
        </div>


        {{--  コメント投稿の本文入力フォーム  --}}
        <div class="form-group">
            <label for="body">本文</label>

            <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
        </div>


        {{--  コメント投稿ボタン  --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">コメントする</button>
        </div>
    </form>


    {{--  投稿内容の編集 削除 キャンセルボタン  --}}
    <div class="mb-4 text-right">
        <a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-info">編集する</a>

        <form style="display: inline-block;" method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">削除する</button>
        </form>

        <a class="btn btn-secondary" href="{{ route('bulletin-board.index') }}">キャンセル</a>

    </div>

@endsection

@include('layout.bulletin-board-footer')