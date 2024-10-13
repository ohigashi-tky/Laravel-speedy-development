# PHP 8.3をベースにしたDockerイメージを使用
FROM php:8.3-fpm

# 必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを設定
WORKDIR /var/www/html

# プロジェクトファイルをコンテナ内にコピー
COPY . .

# ストレージフォルダの権限を設定
RUN chown -R www-data:www-data /var/www/html/storage

# Composerの依存関係をインストール（開発環境向けパッケージはインストールしない）
RUN composer install --no-dev --optimize-autoloader

# HTTPポートを公開
EXPOSE 8000

# アプリケーションのサーバーを起動
CMD php artisan serve --host=0.0.0.0 --port=80
