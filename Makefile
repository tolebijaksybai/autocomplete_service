build:
	docker-compose build # --no-cache --force-rm
down:
	docker-compose down
stop:
	docker-compose stop
up:
	docker-compose up -d

bash-root:
	docker exec -it autocomplete_service_app bash
bash-user:
	docker exec -u developer -it autocomplete_service_app bash
bash-default:
	docker exec -u www-data -it autocomplete_service_app bash