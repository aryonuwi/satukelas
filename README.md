# SATUKELAS TEST
*[aryo nurwanto](https://github.com/aryonuwi)*

## Start and Finis test
- 14:30 - 15:50

## Prerequired
- [PHP v8.1.3](https://www.php.net/releases/8.1/en.php)
- [MysqlSQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [Lumen V9X](https://lumen.laravel.com/docs/9.x)

## API Documentation
- [API](https://documenter.getpostman.com/view/13234224/UVyxPtHA)

## INFO Installation

### Clone GIT
```
https://github.com/aryonuwi/satukelas.git [Folder name]
```
### Get Depedencies with Composer
```
composer install
```

### ENV Database Required
create file .env 

### ENV Database Required
```
DB_CONNECTION=mysql
DB_HOST=[pgsql HOST]
DB_PORT=[pgsql PORT]
DB_DATABASE=[Database Name]
DB_USERNAME=[Users Name]
DB_PASSWORD= [Password]
```

### Migration Database
- Create tabel untuk database
`````
 php artisan migrate
`````
### RUN APPLICATION
`````
 php localhost:8000 -t public
`````
