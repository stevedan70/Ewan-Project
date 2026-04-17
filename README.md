### start
```
$ docker container start voice-up-nginx
$ docker exec -it voice-up-nginx /bin/bash
$ nginx
$ /etc/init.d/php8.3-fpm start
```








### stop
```
$ docker container stop voice-up-nginx
```

### folder permission
```
$ php artisan storage:link
chmod -R 755 storage
chmod -R 755 vendor
chmod -R 644 bootstrap/cache

chmod -R 775 storage
chmod -R 775 storage/app
chmod -R 775 storage/app/public
chown -R www-data:www-data storage
```
