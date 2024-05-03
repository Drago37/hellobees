# COLORS
GREEN  := $(shell tput -Txterm setaf 2)
YELLOW := $(shell tput -Txterm setaf 3)
RESET  := $(shell tput -Txterm sgr0)

help:
	@echo ''
	@echo 'Utilisation :'
	@echo '  ${YELLOW}make${RESET} ${GREEN}<command>${RESET}'
	@echo ''
	@echo 'Commandes :'
	@awk '/^[a-zA-Z\-\_0-9]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")-1); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "  ${YELLOW}%-$(TARGET_MAX_CHAR_NUM)s${RESET} ${GREEN}%s${RESET}\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

## Start containers
start:
	@chmod -R 777 ./logs
	@chmod -R 777 ./data
	@chmod +x ./config/php/docker/entrypoint.sh
	@docker compose up

## Close containers
stop:
	@docker compose down

## Clean docker
prune:
	@docker compose down
	@docker system prune -a

## Execute composer install of hellobees
composer-install:
	@docker compose exec php bash -c "\
		cd /home/hellobees/www && composer install"

## Execute composer update of hellobees
composer-update:
	@docker compose exec php bash -c "\
		cd /home/hellobees/www && composer update"

## To access at PHP container with bash
bash-php:
	@docker compose exec -w "/home/hellobees/www" php bash

## To access at DB container with bash
bash-db:
	@docker compose exec db bash

## To delete DB data
db-remove:
	@rm -rf ./data/db

## Reset DB with dumps
db-reset: stop db-remove start
