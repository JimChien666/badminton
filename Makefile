#!/usr/bin/make -f
IMAGE := laravel
VERSION := latest

.PHONY: all build rebuild shell run

# ------------------------------------------------------------------------------

all: build

test: vendor .env phpcs build/phpunit

vendor: composer.lock
	composer install

build: down vendor
	docker-compose build

up:
	docker-compose up -d
	docker-compose exec badminton php artisan migrate --force

down:
	docker-compose

.env:
	cp .env.example .env
	php artisan key:generate

phpcs:
    php -dmemory_limit=-1 vendor/bin/phpcs --parallel=1

clean-build-phpcs:
	rm -rf build/phpcs.xml

build/phpunit:
	php -dmemory_limit=-1 vendor/bin/phpunit --no-coverage --stop-on-failure

