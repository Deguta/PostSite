<link rel="stylesheet" href="{{ asset('css/OnlineReviews/header.css') }}">

@if (Route::has('login'))
    <p class="ribbon"><span>Hospital Reviews</span></p>

    <div class="header-right">
        @auth
            <a href="{{ url('/home') }}">ログアウトはこちら</a>
        @else
            <div class=login>
                <a href="{{ route('login') }}">ログインはこちら</a>
            </div>
            <div class=register>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">新規会員はこちら</a>
            @endif
            </div>
        @endauth
    </div>
@endif


