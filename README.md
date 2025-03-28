# プロジェクト名
Laravel-speedy-development

## 概要
日記アプリです。
基本的なCRUD、画像アップロード可能です。

## 主な技術スタック
- **バックエンド & フロントエンド**：PHP8.3 Laravel11
- **UIテンプレート**：AdminLTE
- **DB**：MySQL8.0
- **認証機能**：Laravel Breeze
- **開発環境**：Laravel Sail (Docker)

## セットアップ手順
**注意点**: このプロジェクトは`pnpm`を使用しています。

リポジトリをローカル環境にクローン
```bash
git clone https://github.com/ohigashi-tky/Laravel-speedy-development
cd Laravel-speedy-development
```

.env作成
```bash
cp .env.example .env
```

アプリケーションキー作成
```bash
./vendor/bin/sail artisan key:generate
```

Sailを使ってDockerコンテナ起動
```bash
./vendor/bin/sail up -d
```

依存関係のインストール
```bash
./vendor/bin/sail composer install
./vendor/bin/sail pnpm install
```

マイグレーション、シーディング
```bash
./vendor/bin/sail artisan migrate --seed
```

下記にアクセスしてログイン画面が表示されればOK
http://localhost

# 画面イメージ
一覧  
![alt text](./public/img/image.png)

登録  
![alt text](./public/img/image-1.png)

登録完了  
![alt text](./public/img/image-2.png)

編集  
![alt text](./public/img/image-3.png)

編集完了  
![alt text](./public/img/image-4.png)

削除  
![alt text](./public/img/image-5.png)

削除完了  
![alt text](./public/img/image-6.png)

ページネーション  
![alt text](./public/img/image-7.png)