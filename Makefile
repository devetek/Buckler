run-dev:
	@ test -f docker/mysql/volume || mkdir -p docker/mysql/volume
	@ test -f docker/mysql/restore || mkdir -p docker/mysql/restore
	@ docker-compose down && docker-compose up