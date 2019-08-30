run-dev: .validate
	@ test -f docker/mysql/volume || mkdir -p docker/mysql/volume
	@ test -f docker/mysql/restore || mkdir -p docker/mysql/restore
	@ docker-compose down && docker-compose up

.validate:
	$(eval DCOMPEXIST := $(shell which docker-compose))
	
	@ test -n "$(DCOMPEXIST)" || sh -c 'echo "No docker-compose binary installed, How to install https://docs.docker.com/compose/install/" && exit 1'