export BUILD_ENV=Production
# build for development, for build machine please confirm to devOps need install composer to support install dependencies
build: .validate
ifeq ($(BUILD_ENV),Development)
		$(eval TAG := $(shell echo "development"))
else
	$(eval TAG := $(shell echo "latest"))
endif
	@ docker build -f Dockerfile/$(BUILD_ENV).Dockerfile --tag=prakasa1904/wp-environment:$(TAG) .
	@ docker push prakasa1904/wp-environment:$(TAG)


run-dev: .destroy-dev
	@ test -d backup/mysql/volume || mkdir -p backup/mysql/volume
	@ test -d backup/mysql/restore || mkdir -p backup/mysql/restore
	@ docker-compose -f dev.docker-compose.yml up

run-prod:
	@ docker-compose -f prod.docker-compose.yml down
	@ docker-compose -f prod.docker-compose.yml up

.destroy-dev: .validate
	@ cp .env.example .env
	@ docker system prune
	@ docker-compose -f dev.docker-compose.yml down

.validate:
	$(eval DCOMPEXIST := $(shell which docker-compose))
	
	@ test -n "$(DCOMPEXIST)" || sh -c 'echo "No docker-compose binary installed, how to install https://docs.docker.com/compose/install/" && exit 1'
