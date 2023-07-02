# 「MEMAP」~ memory × map ~
アルバムに写真と場所を登録してどこに行ったかも地図でわかるアプリケーション．  

# DEMO
[こちら](https://peaceful-sierra-12595.herokuapp.com/login)で試すことができます．  現在GoogleMapのAPIが使えない状態です。

ログインする際には，  
email : abc@gmail.com  
PW : abc

# Features
以下にwebアプリの画面を一部紹介する.

- ダッシュボード画面
<img width="1440" alt="スクリーンショット 2023-01-26 13 24 18" src="https://user-images.githubusercontent.com/116939327/214758211-0cfc12dd-a70c-493e-9dcd-8682db396fa0.png">

- ホーム画面
<img width="1440" alt="スクリーンショット 2023-01-26 13 22 36" src="https://user-images.githubusercontent.com/116939327/214758083-d1528daa-d673-4494-a4aa-92859bb4a156.png">

- アルバムビュー画面(Album list から)
<img width="1440" alt="スクリーンショット 2023-01-26 13 26 10" src="https://user-images.githubusercontent.com/116939327/214758504-6c475263-54fe-4c33-8568-f3afd593df73.png">

- アルバム編集画面(編集アイコンから)
<img width="1440" alt="スクリーンショット 2023-01-26 13 29 53" src="https://user-images.githubusercontent.com/116939327/214758850-72886e24-547a-4ee2-85d2-e090496fd01b.png">
<img width="1440" alt="スクリーンショット 2023-01-26 13 30 01" src="https://user-images.githubusercontent.com/116939327/214758895-153338b0-eeea-46f4-8cd8-0860bb454958.png">

- アルバム新規作成画面(先にアルバム情報と位置情報を1つ登録)
<img width="1440" alt="スクリーンショット 2023-01-26 13 31 52" src="https://user-images.githubusercontent.com/116939327/214758970-4e9d584e-0f15-4bec-9481-4578b85661f2.png">

# Future Features
- [x] ログイン機能
- [x] seeder
- [x] リレーション
- [ ] スマホ対応のresponsive
- [ ] 認証機能
- [ ] お気に入り機能
- [ ] 日付順並び替え機能
- [ ] 写真のポップアップ機能
- [ ] Googleマップでのピンの位置によるzoom調節
- [ ] 移動ルートの作成・編集・表示
- [ ] インスタグラム写真との連携

# Requirement
* php: ^8.0.2
* guzzlehttp/guzzle: ^7.2
* laravel/framework: ^9.19
* laravel/sanctum: ^3.0
* laravel/tinker: ^2.7

# Installation
インストールと初期設定
```bash
git clone https://git@github.com:seiyafukushi/memap.git
cd workout-question
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```  

.envの中身を設定
```.env
DB_DATABASE={db_name}
DB_USERNAME={db_username}
DB_PASSWORD={db_password}
CLOUDINARY_URL=cloudinary:{**************}
```

マイグレーションを実行して，サーバを起動
```bash
php artisan migrate:fresh --seed
php artisan serve --port=8080
```

# Note
作成中のアプリのためバグがあった場合には，下記まで連絡をお願いします

# Author
- 作成者：福士晴哉
- 所属：東京工業大学情報理工学院ライフエンジニアリングコース
- E-mail：seiyaf294@gmail.com(仮)

# license
"MEMAP" is under MIT license.
