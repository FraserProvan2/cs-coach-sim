clear_cache:
	php artisan cache:clear
	php artisan route:clear
	php artisan config:clear 
	php artisan view:clear
	composer dump-autoload
