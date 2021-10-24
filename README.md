<img width="500" alt="スクリーンショット 2021-10-24 9 56 16" src="https://user-images.githubusercontent.com/86056191/138575852-fc29e9ac-9fb0-44cd-b8b1-cd77ffc3af5d.png">

## コンセプト
あなたにはこんな経験ありませんか？<br>
スーパーやコンビニでついつい無駄使いをしてしまう・・・。<br>
セールの文字を見ると買ってしまう・・・。<br>
ネットショッピングで衝動買いをしてしまう・・・。<br><br>
Blamerは意志の弱いあなたを寄ってたかって非難してサポートするアプリです。<br><br>

## アプリURL
https://blamer.herokuapp.com/

## アプリ概要
どんなアプリ？
<img width="1103" alt="スクリーンショット 2021-10-24 10 01 45" src="https://user-images.githubusercontent.com/86056191/138575928-a7aae936-a928-4f3d-9f99-f0698f47d740.png">

<img width="1104" alt="スクリーンショット 2021-10-24 10 02 22" src="https://user-images.githubusercontent.com/86056191/138575938-473e57b1-f4b8-4a48-ad36-4014a128054e.png">

## 使用技術
**バックエンド**<br>
・PHP 7.3<br>
・Laravel 8<br>

**フロントエンド**<br>
・HTML<br>
・CSS<br>
・JavaScript<br>
・Bootstrap 4<br>

**データベース**<br>
・mySQL5.7<br>

**インフラ**<br>
・Docker(開発環境)<br>
・Heroku<br>
・Amazon S3(画像アップロード)<br>

**バージョン管理**<br>
・Git 2.15.0<br>
・GitHub<br>

## ER図
![Untitled Diagram](https://user-images.githubusercontent.com/86056191/138594775-0156bfbf-6e67-4ad1-91ee-fe1ad4223d86.jpg)

## 機能一覧
共通<br>
・ログアウト<br>
・投稿画面へ遷移<br>
・マイページへ遷移<br>
・ランク詳細画面へ遷移（ログイン時のみ）<br>
・お問い合わせフォーム<br>
・利用規約表示<br>
・プライバシーポリシー表示<br><br>

新規登録画面<br>
・ユーザーを新規登録できる<br><br>

ログイン画面<br>
・メールアドレスとパスワードでログインできる<br><br>

トップページ<br>
・投稿一覧<br>
・投稿詳細画面へ遷移（タイトルまたは画像をクリック時）<br>
・ページネーション<br><br>

投稿詳細画面<br>
・投稿の詳細を表示<br>
・コメント表示機能<br>
・コメント投稿機能（ログイン時のみ）<br>
・ベストコメントに選ぶ（ログイン時のみ）<br>
・いいね機能（ログイン時のみ）<br>
・いいね解除機能（ログイン時のみ）<br><br>

投稿画面<br>
・タイトル、画像、ひとことを投稿できる（ログイン時のみ）<br><br>

マイページ・いいね一覧（ログイン時のみ）<br>
・現在のランクを表示<br>
・現在のポイント数を表示<br>
・現在のベストコメントに選ばれた数を表示<br>
・自分の投稿一覧を表示（マイページのみ）<br>
・自分がいいねした一覧を表示（いいね一覧のみ）<br>
・プロフィール編集機能<br>
・退会機能<br><br>

