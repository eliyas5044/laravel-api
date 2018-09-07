init:
	composer install

	@if [ ! -f .env ];\
		then cp .env.example .env;\
		echo "Copied from .env.example";\
		php artisan key:generate;\
		php artisan jwt:secret;\
	fi

	php artisan migrate:fresh --seed