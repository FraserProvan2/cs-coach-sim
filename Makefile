setup:
	composer install
	php artisan key:generate
	php artisan storage:link

setup_local:
	npm install
	npm run dev

clear_cache:
	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear 
	php artisan view:clear
	composer dump-autoload

test:
	php artisan test