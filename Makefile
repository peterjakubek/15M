up:
	docker-compose -f docker-compose.yml up -d

down:
	docker-compose -f docker-compose.yml down

ssh:
	docker exec -it 15marketing-app bash

migrate:
	docker exec -it 15marketing-app php artisan migrate

test:
	clear && docker restart 15marketing-selenium && sleep 5 && docker exec -it 15marketing-app bash -c "cd tests && php ../vendor/bin/behat"

install-dusk:
	docker exec -it 15marketing-app php artisan dusk:install
