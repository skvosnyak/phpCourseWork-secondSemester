up:
	docker compose up -d

up-build:
	docker compose up --build -d

down:
	docker compose down 

logs-app:
	docker compose logs -f app

logs-bd:
	docker compose logs -f bd

bash:
	docker compose exec app bash

rebuild:
	docker compose down
	docker compose up --build -d