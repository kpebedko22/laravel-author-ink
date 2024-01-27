# php-test-laravel

## Local deploy via Docker

Clone repository

```shell
git clone https://github.com/kpebedko22/laravel-author-ink.git
```

Copy `.env.example` as `.env`

```shell
cp .env.example .env
```

Build docker container using Makefile

```shell
make build-local
```

Start docker containers using Makefile

```shell
make up-local
```

**Next steps must be executed inside `fpm container`**

Prepare app key, storage link, etc

```shell
make prepare-app
```

Seed database

```shell
make refresh
```

Now application should be available at http://localhost:8000 in browser.
