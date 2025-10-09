# ✨ Brief description

- This project is a simple api that exposes a list of projects to any frontend available

- This project uses breez for authentication, once in, one can make CRUD operations on projects providing title and description.

# ⚙️ Setup Instructions

## 1-When inside the project add the "vendor" folder by running run

### `docker compose run --rm composer install`

## 2-Add the .env file inside the src folder and fix the database connection inside

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=projects-api
    DB_USERNAME=projects-api
    DB_PASSWORD=secret

## 3-Start the app containers, except bootstrap

### `docker compose up -d --build server php mysql`

## 4-Fix possible permission issues with the app containers still up

### `docker compose exec php chmod -R 775 storage bootstrap/cache`

### `docker compose exec php chown -R www-data:www-data storage bootstrap/cache`

## 5-Generate the app key with the app containers still up

### `docker compose exec php php artisan key:generate`

## 6-Enter the php conatiner and run the migrations

### `docker compose exec php php artisan migrate`

## 7-Set up the boostrap part and install node_modules folder

### `docker compose run --rm npm install`

### `docker compose up -d vite`

The app runs in the development mode.\
Open [http://localhost:8081](http://localhost:8081) to view it in your browser.

## 8-To stop all the app containers

### `docker compose down`

## 9-To start all the app containers including bootsrap

### `docker compose up -d --build server php mysql vite frontend minio mc`
