ifneq (,$(wildcard ./.env))
    include .env
    export
endif

setup: 
	cp .env.example .env; 
	cp laravel/.env.example laravel/.env;
	docker network create appnet

# start deploying
start-dep: composer npm composer-install dockerInstall build up 

git-config:
	@echo "Настройка Git..."
	@read -p "Введите ваше имя: " name; \
	git config user.name "$$name"; \
	read -p "Введите вашу электронную почту: " email; \
	git config user.email "$$email"; \
	echo "Настройка завершена."; \
	git config user.name; \
	git config user.email

# deploying
composer:
	bash deploying/composer.sh
npm:
	apt install nodejs; node -v; apt install npm
composer-dep:
	composer install 
dockerInstall:
	bash deploying/docker-install.sh


# Чистая инициализация
init: docker-down-clear docker-build up

# Полностью обновить образы
update: docker-down-clear docker-pull docker-build-pull up

# Delete images by tag
delete-tag: docker-clear-images-tag
# Delete iages by names
delete-name: docker-clear-images-name


# shortcuts
start: docker-up composer-install key-storage npm-install
stop: docker-down
restart: stop start
rebuild: stop build start 
build: docker-build

docker-build:
	docker compose build
docker-up:
	docker compose up -d
docker-down:
	docker compose down --remove-orphans
docker-down-clear:
	docker compose down -v --remove-orphans
docker-pull:
	docker compose pull
docker-clear-images-tag:
	docker rmi $$(docker images --format '{{.Repository}}:{{.Tag}}' | grep ':${TAG}') -f
docker-clear-images-name:
	docker rmi $$(docker images --format '{{.Repository}}:{{.Tag}}' | grep '${PROJECT}') -f
composer-update:
	docker compose exec app composer update
composer-install:
	docker compose exec app composer install
key-storage:
	docker compose exec app php artisan key:generate
	docker compose exec app chmod -R 777 storage
chmod:
	docker exec -it php chmod -R 777 
exec:
	docker compose exec app bash

migrate:
	${DOCKER_EXEC_APP} php artisan migrate:fresh $(s)

run-tests:	
	read -p "Тип теста? - " type; \
	if [ -z "$$type" ]; then\
		type="Feature"; \
	fi; \
	docker compose exec app php artisan test --testsuite=$$type

tinker:
	docker compose exec app php artisan tinker app/Console/tinker.php

migrate-fresh:
	docker compose exec app php artisan migrate:fresh --seed