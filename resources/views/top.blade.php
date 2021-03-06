<DOCTYPE HTML>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">

  {{--  SEO対策 レスポンシブデザイン  --}}
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('/css/bulletin-board/top.css') }}" >

  {{-- レスポンシブデザイン CSS  750px以下になると反映  --}}
  <link rel="stylesheet" href="{{ asset('/css/bulletin-board/top.css') }}" media="screen and (max-width:750px)" >
  </head>

  <body>


    {{--  ヘッダー  --}}
    <header class="navbar navbar-dark  navbar-expand-sm bg-primary ">
      <div class="container">
          <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">Study-Of-PostSite</a>
          <div class="collapse navbar-collapse justify-content-end">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="#">新規登録はこちら</a>
              <a class="nav-item nav-link active" href="#">ログインする</a>
            </div>
          </div>
      </div>
    </header>


    {{--  ヘッダートップイメージ  --}}
    <div class="header-image">
      <img src="{{ asset('/css/images/top-image.jpg') }}" id="top-image" alt="トップ画像">
      <p class="top-p text-warning font-weight-bold mb-5">プログラミング学習を共有しよう!!</p>
      <a href="{{ route('bulletin-board.index') }}"  class="create-btn mt-5  font-weight-bold">投稿一覧ページはこちらです</a>
    </div>


    {{--  Study-Of-PostSiteの概要  --}}
    <section class="border border-dark bg-light">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mt-5">
                    <h1 id="description">
                      Study-Of-PostSiteとは?
                    </h1>
                </div>
                <p class="text-center h2-desc font-weight-bold">皆さんの学習状況を投稿しあう投稿サイトになります。</p>
                <p class="text-center h2-desc font-weight-bold">誹謗中傷の投稿は削除させていただきます。</p>
                <p class="text-center h2-desc font-weight-bold">皆さんで学習のモチベーションを高め合いましょう!!</p>

                <div class="text-center mt-5 mb-5">
                    <a href="{{ route('bulletin-board.create') }}" class="btn btn-danger btn-lg"><i class="fa fa-edit mr-2"></i>投稿はこちらになります</a>
                </div>
            </div>
        </div>
      </div>
    </section>

    {{--  お問い合わせ  --}}
    <footer class="bg-dark pt-5 pb-5">
      <div class="container">
        <div class=" card-body text-center text-light">
          <a href="{{ route('contact.index') }}" id="contact-page">
            <h4>お問い合わせはこちらになります</h4>
          </a>
        </div>
      </div >
    </footer>

  </body>
  </html>