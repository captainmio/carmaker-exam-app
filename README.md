# RemotePH Examination simple Car manufacture mini WebApp

To setup backend please do the steps.

##Step 1
cd to backend/
Install laravel packages
```
composer install
```

##Step 2
Generate Key
```
php artisan key:generate
```

##Step 3
update **.env** file with your database credentials

```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
```

##Step 4
Run schema update by running the command below.
```
php artisan migrate
```

##Step 5
All backend package are now setup, we need to generate an encryption key for laravel passport for secured access token, run the command below
```
php artisan passport:client --personal
```

##Step 6
you can now run the server (please use port :8000 as I explicitly use this port in the axios base URL)
```
php artisan serve
```

##Step 7
cd to frontend and run 
```
npm install
```

##Step 8
```
npm run dev
```