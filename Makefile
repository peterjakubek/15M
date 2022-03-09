up:
	docker-compose -f docker-compose.yml up

down:
	docker-compose -f docker-compose.yml down

ssh:
	docker exec -it 15marketing-app bash

migrate:
	docker exec -it 15marketing-app ./artisan migrate
