![study-of-postsite](https://user-images.githubusercontent.com/64835852/111588119-79d33c00-8806-11eb-8942-144dd1a65b52.jpg)

# 概要
**Study-Of-PostSite**は誰でも簡単に投稿ができるWebアプリケーションになっています。<br>
自分が現在勉強しているプログラミング言語を選択して気軽に投稿できます。



# 制作背景
基本的なCRUD機能のwebアプリケーションを自力で作りたいと思ったので
この投稿サイトを作ることにしました。<br>
これを応用することで今後、私が作りたいものの第一歩になると思います。
本来作成したいwebアプリケーションのDBの設計図の途中経過を添付します。

### 製作中のwebアプリケーションとDB設計
![hospital-reviews](https://user-images.githubusercontent.com/64835852/111732699-70ef7280-88b9-11eb-9153-2ec08b86b5b3.jpg)
![db-Online-Reviews](https://user-images.githubusercontent.com/64835852/111604791-00911480-8819-11eb-9592-12720d05caa9.jpg)



# 操作説明
### 投稿するには?
トップページの **投稿はこちらになります** または、投稿一覧ページの**投稿の新規作成はこちら**のどちらかクリックして下さい。
投稿ページに遷移すると名前、カテゴリー選択、件名、メッセージの4項目を全て記述。最後に**投稿する**をクリックすると
投稿ができるようになります。**間違いがある場合は赤文字でエラーが出るようになります。**

### 投稿のGIF動画
![投稿のGIF動画](https://user-images.githubusercontent.com/64835852/111613125-89ac4980-8821-11eb-8b68-f12a70c4c7ce.gif)


### コメントを残すには?
**続きを読む**をクリックしたら一番下にコメントのテキストエリアがあります。名前、本文を入力して**コメントする**をクリックすると
コメントを残すことができます。また、投稿にコメントの数を表示できるようになっています。

### コメントのGIF動画
![コメントのGIF動画](https://user-images.githubusercontent.com/64835852/111614299-c75da200-8822-11eb-9adf-ea11f60489ec.gif)


### 編集をするには?
**編集する**をクリックして下さい。編集画面に遷移したら編集するテキストエリアを全て埋めて下さい。最後に**更新する**を更新内容が反映されます。

### 編集のGIF動画
![編集のGIF動画](https://user-images.githubusercontent.com/64835852/111725342-3f22df80-88aa-11eb-939f-2397c45131d5.gif)



# 補足事項
1. ログイン機能は実装しておりますが、採用担当者様に現在はすぐにアクセスし利用いただけるように`ログイン機能の実行を解除しています`
2. 新規投稿または編集画面にて、「カテゴリー」のテキストエリアでバリデーションが出ないので現在修正中です。



# こだわり
### レスポンシブサイズに適用(iPhoneにて閲覧可能)
現在、スマートフォンの普及率は8割を超えて尚且つ、サイトはPCよりもスマートフォンで閲覧する傾向が高いことが調べて分かりました。
そこで、SEO対策も兼ねてレスポンシブサイズに挑戦しました。横幅750px以下で文字の大きさやボックスの大きさの変化が見れると思います。
今後も、レスポンシブサイズに対応できるように引き続きHTML CSS JavaScriptを勉強します。<br>
[→[Qiita laravel レスポンシブサイズ](URL)]<br>

[参考文献 総務省HP](https://www.soumu.go.jp/johotsusintokei/whitepaper/ja/r02/html/nd252110.html#:~:text=2019%E5%B9%B4%E3%81%AB%E3%81%8A%E3%81%91%E3%82%8B%E4%B8%96%E5%B8%AF%E3%81%AE,2%2D1%2D1%EF%BC%89%E3%80%82)<br>

[参考文献 株式会社ファインピクサー](https://fainpixar.co.jp/column/web-marketing/40827/)



### 現在のコメント数を表示

### 可読性を上げる為にconfigフォルダを使用してoptionの選択肢を作成
option内容が多い都道府県は47個ありますがこれをviewファイルに全て記述すると見えにくい上に編集もし辛いと思います。
そこで、Configフォルダにoption内容を格納する方法を実行してみました。今回のoption内容は少ないですが多い時に実用できると思います。
こちらのQiitaに纏めています。<br>
[→[Qiita laravel Configフォルダを使ってoptionをスッキリさせたい!!](https://qiita.com/yutarou/items/4f7cdb74a409e0ace6c0)]



# 使用技術一覧
**バックエンド**<br>
PHP 7.2.34 / Laravel 6.20.16

**フロントエンド**<br>
HTML / CSS / javascript(現在学習中のため今後組み込む)

**インフラ**<br>
MySQL Ver 14.14 Distrib 5.6.50 / AWS(EC2,S3)

**その他の使用技術**<br>
git(gitHub) / Visual Studio Code / Gmail


# DB設計

### postsテーブル(新規投稿)
| **カラム名** | **定義** |
| ---- | ---- |
| name | string |
| subject | string |
| category | string |
| message | string |

### categoriesテーブル(カテゴリー選択)
| **カラム名** | **定義** |
| ---- | ---- |
| name | string |

### commentsテーブル(コメント投稿)
| **カラム名** | **定義** |
| ---- | ---- |
| name | string |
| comment | text |
| post_id | unsignedBigInteger |




# 苦労したところ
### ①環境構築
初めてwebアプリケーションを作成する際に環境構築のエラーにつまづいて進捗が止まりました。
エラーは解消しましたが、今後新しいwebアプリケーションを作成する際、困らないようにQiitaで纏めてみました。
これがきっかけとなって新しく気づいたことや理解したことをQiitaで投稿する習慣になりました。<br>
お陰様で、2021年3月20日現在**16 Contributions** を達成することができました。<br>
[→[Qiita --hide-modules](https://qiita.com/yutarou/items/e00a05b4d84ed40dc444)]<br>
[→[Qiita 初めてのDB接続](https://qiita.com/yutarou/items/9cc90e0a0c3eec51e510)]

### ②検索機能
どこにでもある検索機能ですがこれを実装するのが難しかったです。<br>
今回はスコープを使用した検索機能になります。毎回同じ検索条件を書くならEloquentのクエリスコープを使った方が楽だからです。
また、検索機能で使用する時にWhere句はよく使います。このWere句ですが、条件式をモデルに定義（スコープ機能）して使いまわすことができます。今後、複雑な検索機能を実装するための基本となりますので実装してみました。<br>

[→[Qiita 検索機能の実装](https://qiita.com/yutarou/items/9da4e5248e8df5b2c5ce)]


### ③AWSでのデプロイ
web系企業ではクラウドはAWSが主流になっていますのでAWSを用いて本番環境を構築しました。初めてのVimコマンドの操作に慣れていないことや、ディレクトリの階層も頭に入っていなかったことで、configファイルや.envファイルを探したり編集するだけでかなり難航しました。特に、ローカル環境では反映されているが本番環境で反映されていないというエラーが多発して苦戦しました。

[→[Qiita 2021年版 画像付き AWS ERROR 2003 (HY000): Can't connect to MySQL server](https://qiita.com/yutarou/items/553f60e11b5535050468)]




# 最後に
大変お忙しい中、最後までご覧いただき誠にありがとうございました。<br>
ご興味を持っていただけましたら、下記リンクもご覧頂けると幸いです。<br>

[→[自己紹介サイト](http://ym-portfolio.work/):学歴・職務経歴・webエンジニアを目指す経緯などを記載しています！]<br>
[→[Qiitaはこちら](https://qiita.com/yutarou):新しく学習した事や理解できたことはQiitaに投稿して発信力を持ったエンジニアになる為に投稿しています！]<br>
[→[Twitterはこちら](https://twitter.com/Fisher21663470):Qiitaで投稿した内容を拡散しています！]<br>

