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

status:
	@ docker-compose ps

log:
	@ docker-compose logs -f

down:
	@ docker-compose down

run-dev: .destroy-dev
	@ cp -rf dev.docker-compose.yml docker-compose.yml
	@ test -d backup/mysql/volume || mkdir -p backup/mysql/volume
	@ test -d backup/mysql/restore || mkdir -p backup/mysql/restore
	@ docker-compose down
	@ docker-compose up -d

run-prod:
	@ cp -rf prod.docker-compose.yml docker-compose.yml
	@ docker-compose down
	@ docker-compose up -d

.destroy-dev: .validate
	@ cp .env.example .env
	@ docker system prune

.validate:
	$(eval DCOMPEXIST := $(shell which docker-compose))
	
	@ test -n "$(DCOMPEXIST)" || sh -c 'echo "No docker-compose binary installed, how to install https://docs.docker.com/compose/install/" && exit 1'
