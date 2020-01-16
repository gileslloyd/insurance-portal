TS := $(shell /bin/date "+%Y-%m-%d--%H-%M-%S")
UTIL := @docker-compose -f docker-compose.yml -f docker-compose.util.yml run --rm

# composer:
# 	@docker-compose exec app /usr/local/bin/composer ${S} ${C}
composer:
	${UTIL} composer ${C}

setup:
	@docker-compose up -d
	@make composer S=api C=install
