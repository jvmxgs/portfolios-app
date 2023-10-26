# Portfolios app

An app of portfolios

![Portfolios app](https://raw.githubusercontent.com/jvmxgs/portfolios-app/fe587b25cf66d4f874b4adf9b6381050e56dca63/public/screenshot.png) "Portfolios app")


## Requirements
	- Git
    - Docker

## Install

#### Clone the repo

```
git clone git@github.com:jvmxgs/portfolios-app.git
```


#### Enter on the project folder

```
cd portfolios-app
```


#### Copy the .env.example to .env

```
cp .env.example .env
```


#### Install composer dependencies

```
docker run --rm \
	-u "$(id -u):$(id -g)" \
	-v $(pwd):/var/www/html \
	-w /var/www/html \
	laravelsail/php81-composer:latest \
	composer install --ignore-platform-reqs
```


#### Start the docker containers
```
./vendor/bin/sail up
```

#### Enter on the docker container
In another terminal enter on the docker container
```
docker exec -it portfolios-app-laravel.test-1 bash
```

#### Create the app key
```
php artisan key:generate
```


#### Run migrations and seeders
```
php artisan migrate:fresh --seed
```

#### Create the symlink for the files
```
php artisan storage:link`
```

#### Install the frontend dependencies
```
npm install
```

#### Build the frontend
```
npm run build
```
#### Now you can login into the system with the following credentials
- Url: http://localhost:8080
- Email: jhon@example.com
- Password: secret
