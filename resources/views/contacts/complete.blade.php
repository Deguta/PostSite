@extends('layout.bulletin-board-common')
@section('title', '送信完了画面')
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" >
<link rel="stylesheet" href="{{ asset('/css/bulletin-board/index-list.css') }}" media="screen and (max-width:750px)" >

<header>
  @component('components.header')
      @slot('header')
      @endslot
  @endcomponent
</header>

@section('content')
<div class="container">
  <div class="panel-default  w-75  mx-auto card mt-5">
    <div class="panel-heading  h2 p-3 text-center bg-primary text-white">お問い合わせフォーム 確認画面</div>
    <div class="panel-body">
      <div class="form-group">
        <div class="h1 text-center">{{ __('送信が完了しました') }}</div>
          <div class="text-center mx-auto">
          <a href="{{ url('/') }}" id="top-page">トップページに戻る</a>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection



