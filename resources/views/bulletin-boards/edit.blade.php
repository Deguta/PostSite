@extends('layout.bulletin-board-common')
 
@section('title', 'PostSite 投稿ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿ページの説明文')
@section('pageCss')
<link href="/css/bulletin-board/sticky-footer.css" rel="stylesheet">
@endsection
 
@include('layout.bulletin-board-header')
 
@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h4 mb-4 font-weight-bold">
            投稿更新ページ
        </h1>
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->subject }}</td>
                <td>{!! nl2br(e($post->message)) !!}</td>
            </tr>

             @if (isset( $name ))
            <p>$name</p>
            @else
            <p>Hello</p>
            @endif

        <form method="GET" action="{{ route('bulletin-board.update', $post )}}">
            @csrf
            @method('PUT')

           

            <fieldset class="mb-4">

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
                    <label for="subject">カテゴリー</label>
                    <input id="category" name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" value="{{ old('category') }}" type="text">
                    @if ($errors->has('category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                </div>
 
                <div class="form-group">
                    <label for="subject">件名</label>
                    <input id="subject" name="subject" class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}" value="{{ old('subject') }}" type="text">
                    @if ($errors->has('subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="message">メッセージ</label>

                    <textarea id="message" name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" rows="4"> {{ old('message') }} </textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>

                <div class="mt-5">
                    <a class="btn btn-secondary" href="{{ route('bulletin-board.index') }}">キャンセル</a>
                    <button type="submit" class="btn btn-primary">
                        更新する
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection
 
@include('layout.bulletin-board-footer')