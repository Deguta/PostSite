@section('header')
    <header class="navbar navbar-dark bg-primary ">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ route('bulletin-board.index') }}">Post-Site</a>

            <form class="form-inline" method="GET" action="{{ route('bulletin-board.index') }}">
                <input type="text" name="searchword" class="form-control mr-sm-2" value="{{$searchword}}" aria-label="searchword" placeholder="キーワードを入力">
                <button type="submit" class="btn btn-info">検索</button>
            </form>
        </div>
    </header>
@endsection
