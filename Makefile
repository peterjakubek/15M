up:
	docker-compose -f docker-compose.yml up -d

rebuild: down
	docker rm -f 15marketing-selenium 15marketing-app 15marketing-mysql
	docker-compose -f docker-compose.yml build --force-rm --no-cache

clean:
	sudo rm -rf var/mysql src/vendor src/node_modules

down:
	docker-compose -f docker-compose.yml down

ssh:
	docker exec -it 15marketing-app bash

migrate:
	docker exec -it 15marketing-app php artisan migrate

test:
	clear && docker restart 15marketing-selenium > /dev/null && sleep 5 && docker exec -it 15marketing-app bash -c "cd tests && php ../vendor/bin/behat"

install-dusk:
	docker exec -it 15marketing-app php artisan dusk:install
