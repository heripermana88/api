# Heri Permana Test

## clone this repo
```
git clone xxxxxxxxx
```

## Running API

### Setup Laravel
```
cd directory
cp .env.example .env
```

edit yours on env
### using Docker-compose
```
cd directory
```
```
docker-compose build app
```
```
docker-compose up -d 
```
```
docker-compose exec app composer install 
```
```
docker-compose exec app php artisan key:generate  
```
```
docker-compose exec app php artisan migrate  
```
```
docker-compose exec app php artisan db:seed  
```

## baseUrl
```
http://localhost:8000/api/
```