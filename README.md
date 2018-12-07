# ビジターボード

訪問者のチェックイン管理ができるサービスです。主にゲストハウスやシェアハウスでの利用を想定しています。

## 使い方イメージ
言語を選択し、必要情報を入力のうえチェックインします。チェックイン後指定した管理者メールアドレスに通知が飛ぶようになっています。

**フロントページ(index.php)**

<img src="https://user-images.githubusercontent.com/35478148/49662955-8c3f6680-fa90-11e8-9b71-2597b3999f92.png" width="600">

**管理者ページ(admin.php)**

<img src="https://user-images.githubusercontent.com/35478148/49663580-821e6780-fa92-11e8-9c58-f50b811a2b23.png" width="600">

## 事前設定
1. .env_sampleのファイルを参考にDBとホームのURLを定義し、管理者用メールアドレスを「MAIL_FROM=〇〇@gmail.com」のように定義してください。
2. admin.phpから過去のチェックイン履歴を閲覧できます。ベーシック認証をかけることをおすすめします。

## ライセンス
MIT © Sho23
