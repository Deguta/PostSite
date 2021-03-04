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
          <a class="navbar-brand font-weight-bold" href="{{ route('bulletin-board.index') }}">Study-Of-PostSite</a>
          <div class="collapse navbar-collapse justify-content-end">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="#">新規登録はこちら</a>
              <a class="nav-item nav-link active" href="#">ログインする</a>
            </div>
          </div>
      </div>
    </header>

    <div class="content">
      <p class="top-p text-warning font-weight-bold mb-5">皆んなの学習状況を共有しよう!!</p>
      <a href="{{ route('bulletin-board.index') }}"  class="create-btn mt-5  font-weight-bold">投稿一覧ページはこちらです</a>
    </div>

    <section class="border border-dark bg-light">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center m-5">
                    <h1 id="description">
                      Study-Of-PostSiteとは?
                    </h1>
                </div>
                <p class="text-center h2-desc font-weight-bold">皆さんの学習状況を投稿しあうサイトになります。</p>
                <p class="text-center h2-desc font-weight-bold">誹謗中傷の投稿は削除させていただきます。</p>
                <p class="text-center h2-desc font-weight-bold">皆さんで学習のモチベーションを高め合いましょう!!</p>

                <div class="text-center mt-5">
                    <a href="{{ route('bulletin-board.create') }}" class="btn btn-danger btn-lg"><i class="fa fa-edit mr-2"></i>投稿投稿ページはこちら</a>
                </div>

            </div>
        </div>
      </div>
    </section>



  </body>
  </html>

 




 
