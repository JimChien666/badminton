#!/usr/bin/make -f
IMAGE := laravel
VERSION := latest

.PHONY: all build rebuild shell run

# ------------------------------------------------------------------------------

all: build

vendor: composer.lock
	composer install

build: service.down vendor
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down