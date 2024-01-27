up-local:
	docker-compose -f docker-compose-local.yml up -d

down-local:
	docker-compose -f docker-compose-local.yml down

build-local:
	docker-compose -f docker-compose-local.yml build

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

refresh-update: refresh
	yes | php artisan ide-helper:models
	php artisan insights --fix --flush-cache
	./vendor/bin/pint

migrate:
	php artisan optimize
	php artisan migrate
	yes | php artisan ide-helper:models
	./vendor/bin/pint

pint:
	./vendor/bin/pint

insights-fix:
	php artisan insights --fix --flush-cache
	./vendor/bin/pint
