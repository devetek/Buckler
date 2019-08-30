run-dev: .validate
	@ test -f backup/mysql/volume || mkdir -p backup/mysql/volume
	@ test -f backup/mysql/restore || mkdir -p backup/mysql/restore
	@ docker-compose down && docker-compose up

.validate:
	$(eval DCOMPEXIST := $(shell which docker-compose))
	
	@ test -n "$(DCOMPEXIST)" || sh -c 'echo "No docker-compose binary installed, How to install https://docs.docker.com/compose/install/" && exit 1'