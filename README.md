# ✨ Brief description

- This project is a my portfolio project
- On backend i use laravel as an api to generate and expose projects, companies ecc that will be fetched by frontend
- This project uses breez for authentication, once in, one can make CRUD operations on projects and other resources.
- On frontend side i used react.js ad three.js to expose and my fetched data.

# ⚙️ Setup Instructions

## 1-When inside the project add the "vendor" folder by running run

### `docker compose -f docker-compose.dev.yml run --rm composer install`

## 2-Add the .env file inside the src folder and fix the database connection inside

    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=projects-api
    DB_USERNAME=projects-api
    DB_PASSWORD=secret

## 3-Still in the .env at the bottom fix the minio connection inside

    FILESYSTEM_DISK=minio

    AWS_ACCESS_KEY_ID=minioadmin
    AWS_SECRET_ACCESS_KEY=minioadmin
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=portfolio
    AWS_ENDPOINT=http://minio:9000
    AWS_URL=http://localhost:9000/portfolio
    AWS_USE_PATH_STYLE_ENDPOINT=true

## 4-Start the backend(without bootstrap) and minio containers

### `docker compose -f docker-compose.dev.yml up -d  server php mysql minio mc --build`

## 5-Fix possible php permission issues with the app containers still up

### `chmod -R 775 storage bootstrap/cache`

### `chown -R www-data:www-data storage bootstrap/cache`

## 6-Generate the app key with the app containers still up

### `php artisan key:generate`

## 7-Enter the php conatiner and run the migrations and seeds

### `php artisan migrate:refresh --seed`

## 8-Set up the boostrap part and install node_modules folder

### `docker compose -f docker-compose.dev.yml run --rm npm install`

### `docker compose -f docker-compose.dev.yml up -d vite`

The laravel app runs in the development mode.\
Open [http://localhost:8081](http://localhost:8081) to view it in your browser.

Minio runs in the development mode.\
Open [http://localhost:9001/login](http://localhost:9001/login) to view it in your browser.

## 9-Install the node modules inside frontend folder

### `docker compose -f docker-compose.dev.yml run --rm npm-frontend npm install`

## 10-Start frontend container

### `docker compose -f docker-compose.dev.yml up -d frontend --build`

React runs in the development mode.\
Open [http://localhost:3000/](http://localhost:3000/) to view it in your browser.

## 11-To stop all the app containers

### `docker compose down`

## 12-To start all the app containers including bootsrap

### `docker compose -f docker-compose.dev.yml up -d --build server php mysql vite frontend minio mc`

### `docker compose -f docker-compose.dev.yml restart server php mysql vite frontend minio mc`
