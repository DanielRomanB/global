cd /

cd C:\laragon\www\var1
php artisan cache:clear
php artisan config:cache
php artisan migrate --seed
php artisan config:cache
php artisan key:generate
php artisan config:cache
exit

