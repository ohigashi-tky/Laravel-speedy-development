# プロジェクト名
Laravel-speedy-development

## 概要
基本的なCRUD操作ができるテンプレートのようなアプリケーションです。
最小限の時間で開発できるような技術スタックにしています。

## 主な技術スタック
- **バックエンド & フロントエンド**：Laravel 11
- **UIテンプレート**：AdminLTE
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

依存関係のインストール、ビルド、起動
```bash
./vendor/bin/sail composer install
./vendor/bin/sail pnpm install
./vendor/bin/sail pnpm run dev
```

マイグレーション、シーディング
```bash
./vendor/bin/sail artisan migrate --seed
```

http://localhostにアクセスしてログイン画面が表示されればOK