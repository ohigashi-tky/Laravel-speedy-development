# Sailコマンド
sail = ./vendor/bin/sail

# Laravel artisanコマンドのエイリアス
artisan:
	$(sail) artisan $(cmd)

# 他の便利なエイリアスも設定できます
up:
	$(sail) up

down:
	$(sail) down

migrate:
	$(sail) artisan migrate

# 特定のコマンドを使用する例
tinker:
	$(sail) artisan tinker
