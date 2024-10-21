setup:
	@echo "Setting up project..."
	@make backend.setup
	@make frontend.setup

backend.setup:
	@echo "Setting up backend..."
	@docker compose exec php composer install
	@docker compose exec php php bin/console doctrine:database:create --if-not-exists
	@docker compose exec php php bin/console doctrine:migrations:migrate -n
	@docker compose exec php php bin/console sylius:fixtures:load -n

frontend.setup:
	@echo "Setting up frontend..."
	@docker compose exec frontend npm install
	@docker compose exec frontend npm run build

frontend.build:
	@echo "Building frontend..."
	@docker compose exec frontend npm run build
