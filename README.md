![study-of-postsite](https://user-images.githubusercontent.com/64835852/111588119-79d33c00-8806-11eb-8942-144dd1a65b52.jpg)



# 概要

[→[アプリケーションのリンク先はこちら](URL)]</br>


# 制作背景


# システム概要

![システムフロー](/ReadmeFolder/systemflow.png)

# 操作説明


![投稿のテストGIF](https://user-images.githubusercontent.com/64835852/111594604-9bd0bc80-880e-11eb-819a-e2df50ed932c.gif)



# こだわり




# 使用技術
 
**バックエンド**<br>
PHP 7.2.34 / Laravel 6.20.5

**フロントエンド**<br>
HTML / CSS / javascript / jQuery 3.2.1 / Vue.js(現在学習中のため今後組み込む)

**インフラ**<br>
mysql 8.0.22 / AWS(EC2,S3)

**その他の使用技術**<br>
Pusher / git(gitHub) / Visual Studio Code / Gmail
 
# AWS構成図
![画像](/ReadmeFolder/aws.png)

# DB設計
### ・ ER図
![画像](/ReadmeFolder/finaltable.png)
### ・ 各種テーブル

| **テーブル名** | **定義** |
| ---- | ---- |
| owners<br>(オーナー) | オーナーの登録情報 |
| drivers<br>(ドライバー) | ドライバーの登録情報 |
| owner_schedules<br>(オーナースケジュール) | ドライバーの車両貸出可能な日程 |
| chats<br>(チャット) | 会話の内容 |
| contracts<br>(コントラクト) | 契約確定後、契約内容を格納|


# 苦労したところ

### ①DB設計
ER図を添付していますが、実際のアプリケーションとテーブル名やカラム名に相違があります。テーブルの命名規則の理解が曖昧ままDB設計をしており、キャメルケースを用いた記述をしてしまいました。開発終盤に気付きましたが、影響範囲が広すぎて修正が困難になりました。この失敗を二度と繰り返さないよう再度学習を行い、Qiitaにまとめています。初期設計の重要性を身に染みて学びました。[→[Qiita記事 リンク](https://qiita.com/tatsuya_1995/items/4b706fc40fe2f300bbc0)]

### ②Laravelのマルチログイン機能
ドライバーとオーナーで初期の登録方法やログインした後の挙動が変わるため、マルチログイン機能を実装する必要がありました。Laravelでは基本のログイン機能がついていますが、これを応用して２通りのログイン機能を作りました。変更が必要なファイルが多く、それぞれの関連性が分かっていなかったため、苦労しました。ここで３日以上も悩んだことで認証やミドルウェア・ルーティングについての知識を身に着けることができました。[→[Qiita記事 リンク](https://qiita.com/tatsuya_1995/items/92f5448175bd33097c13)]


### ③AWSでのデプロイ
web系企業ではクラウドはAWSが主流になっていますのでAWSを用いて本番環境を構築しました。初めてのVimコマンドの操作に慣れていないことや、ディレクトリの階層も頭に入っていなかったことで、configファイルや.envファイルを探したり編集するだけでかなり難航しました。VPCの生成から数えると30〜40時間以上かけてなんとかデプロイしました。多く悩んだ分、仮想サーバーやIPアドレスの知識・コマンドの操作などを身に着けることができました。


# 最後に
大変お忙しい中、最後までご覧いただき誠にありがとうございました。<br>
ご興味を持っていただけましたら、下記リンクもご覧頂けると幸いです。<br>

[→[自己紹介サイト](url):学歴・職務経歴・webエンジニアを目指す経緯などを記載しています！]</br>
[→[Qiitaはこちら](https://qiita.com/yutarou):新しく学習した事や理解できたことはQiitaに投稿して発信力を持ったエンジニアになる為に投稿しています！]</br>
[→[Twitterはこちら](https://twitter.com/Fisher21663470):Qiitaで投稿した内容を拡散しています！]</br>

