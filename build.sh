cd blog || exit
composer install
sudo chown -R "$USER":www-data storage
sudo chown -R "$USER":www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
php artisan cache:clear