<DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- 表示領域を、各端末の画面幅に合わせて、いい感じに調整する」という内容です。 -->
<title>@yield('title')</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >
</head>

<body>

<div class="container">
    @yield('content')
</div>

@yield('footer')

</body>
</html>