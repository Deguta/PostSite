@extends('layout.bulletin-board-common')
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/edit.css') }}" >
@section('title', '編集と更新ページ')
<header>
        @component('components.header')
            @slot('header')
            @endslot
        @endcomponent
</header>
@section('content')
<div class="container mt-4">
    <h1 class="h4 mb-4 font-weight-bold">
        編集と更新ページ
    </h1>
    <div class="row no-gutters">
       <div class="card col-sm-8 mt-3 mx-auto border-dark">

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

            <div class="card-body">
                <p class="card-text message left">
                    {{ $post->message }}
                </p>
            </div>
        </div>
    </div>
</div>
        <form method="POST" action="{{ route('bulletin-board.update', $post )}}">
            @csrf
            @method('PUT')
            <fieldset class="edit-form mb-4">
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
                        {{--  <select type="text" class="form-control {{ $errors->has('category') ? 'is-invalid' : ''}}" value="{{ old('category') }}"  name="category">  --}}
                        <select type="text" class="form-control" name="category">
                        @foreach($study as $studies)
                            <option value="{{ $studies }}">{{ $studies }}</option>
                        @endforeach
                        </select>
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