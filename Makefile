# build for development, for build machine please confirm to devOps need install composer to support install dependencies
build: .validate
	@ composer install
	@ docker build -f Dockerfile/Production.Dockerfile --tag=prakasa1904/wp-environment .
	@ docker push prakasa1904/wp-environment

run-dev: .validate
	@ test -f backup/mysql/volume || mkdir -p backup/mysql/volume
	@ test -f backup/mysql/restore || mkdir -p backup/mysql/restore
	@ docker-compose -f dev.docker-compose.yml down && docker-compose -f dev.docker-compose.yml up

run-prod: .validate
	@ docker-compose -f prod.docker-compose.yml down && docker-compose -f prod.docker-compose.yml up

.validate:
	$(eval DCOMPEXIST := $(shell which docker-compose))
	
	@ test -n "$(DCOMPEXIST)" || sh -c 'echo "No docker-compose binary installed, how to install https://docs.docker.com/compose/install/" && exit 1'