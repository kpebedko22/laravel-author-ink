up-local:
	docker-compose -f docker-compose.yml up -d

down-local:
	docker-compose -f docker-compose.yml down

build-local:
	docker-compose -f docker-compose.yml build

ul: up-local
dl: down-local
bl: build-local

prepare-app:
	composer install
	php artisan optimize
	php artisan key:generate
	php artisan storage:link
	php artisan optimize

refresh:
	php artisan optimize
	php artisan migrate:fresh
	php artisan db:seed

	exit 0
