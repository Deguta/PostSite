<DOCTYPE HTML>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>トップページ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="/css/bulletin-board/top-page.css" rel="stylesheet">
  

  </head>

  <body>
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

    <img src="{{ asset('/css/images/top-image.jpg') }}" id="top-image" alt="トップ画像">
    <p class="top-p text-warning font-weight-bold mb-5">皆んなの学習状況を共有しよう!!</p>
    <a href="{{ route('bulletin-board.index') }}"  class="create-btn mt-5  font-weight-bold">投稿一覧ページはこちらです</a>

    <section class="border border-dark bg-light">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center mt-5">
                    <h1 id="description">
                      Study-Of-PostSiteとは?
                    </h1>
                </div>
                <p class="text-center h2-desc font-weight-bold">皆さんの学習状況を投稿しあうサイトになります。</p>
                <p class="text-center h2-desc font-weight-bold">誹謗中傷の投稿は削除させていただきます。</p>
                <p class="text-center h2-desc font-weight-bold">皆さんで学習のモチベーションを高め合いましょう!!</p>

                <div class="text-center mt-5 mb-5">
                    <a href="{{ route('bulletin-board.create') }}" class="btn btn-danger btn-lg"><i class="fa fa-edit mr-2"></i>新規投稿ページはこちら</a>
                </div>
            </div>
        </div>
      </div>
    </section>

    <footer class="bg-dark pt-5 pb-5">
      <div class="container">
        <div class="card-body text-center text-light">
          <h4>開発者のQiita Twitter Githubも是非見て下さい</h4>
        </div>
        <ul class="list-inline mb-5 d-flex justify-content-around ">
          <li>
            <a href="https://qiita.com/yutarou">
              <div class="navbar-brand-qiita"></div>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/Fisher21663470">
              <div class="navbar-brand-twitter d-block m-auto"></div>
            </a>
          </li>
          <li>
            <a href="https://github.com/Deguta">
              <div class="navbar-brand-github"></div>
            </a>
          </li>
        </ul>
      </div>
    </footer>
  </body>
  </html>

 




 
