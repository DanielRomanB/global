cd /
cd C:\laragon\www\var1
php artisan cache:clear
cd C:\laragon\www\facturacion
php artisan cache:clear
php artisan config:cache
cd /
cd C:\laragon\www\var1
php artisan migrate:fresh
php artisan migrate:fresh --seed

php artisan key:generate
exit

