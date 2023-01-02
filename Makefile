#!/usr/bin/make -f
IMAGE := laravel
VERSION := latest

.PHONY: all build rebuild shell run

# ------------------------------------------------------------------------------

all: build

vendor: composer.lock
	composer install

build: down vendor
	docker-compose build

up:
	docker-compose up -d
	docker-compose exec badminton php artisan migrate --force

down:
	docker-compose down