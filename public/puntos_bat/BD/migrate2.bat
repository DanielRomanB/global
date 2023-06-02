cd /
cd C:\laragon\www\facturacion_50_d1s4bl3d
php artisan cache:clear
cd C:\laragon\www\facturacion
php artisan cache:clear
php artisan config:cache
cd /
cd C:\laragon\www\facturacion_50_d1s4bl3d
php artisan migrate:fresh
php artisan migrate:fresh --seed

php artisan key:generate
exit

