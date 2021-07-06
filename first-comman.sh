# Very first command for initializing service
composer install
php artisan optimize:clear
php artisan migrate:fresh --seed --seeder=PermissionSeeder