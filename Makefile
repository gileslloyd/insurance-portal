TS := $(shell /bin/date "+%Y-%m-%d--%H-%M-%S")
UTIL := @docker-compose -f docker-compose.yml -f docker-compose.util.yml run --rm

composer:
	${UTIL} composer ${C}

setup:
	@docker-compose up -d
	@make composer S=api C=install

test:
	@docker-compose exec app ./vendor/bin/phpunit
