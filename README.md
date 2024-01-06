# poynt-hackathon
This is a an ecommerce api using Laravel 

# Api Schema 
## products
    name
    image
    price
    description
    category_id

## product_images
    product_id
    image

## categories
    name
    image

## orders
    order_date
    status ( pending -- person has not paid
        proccessing -- person has paid
        completed -- person has recieved product
        cancelled )
    reference
 	  
## order_items
    product_id
    quantity
    amount
    order_id


## Local set-up instructions
* [Set-up with composer](#set-up-using-composer)
* [Set-up using Docker(sail)](#set-up-using-sail)


## Set-up using composer

### Clone the repo 
```
gh repo clone josh-boat365/poynt-hackathon
```
or

```
git clone git@github.com:josh-boat365/poynt-hackathon.git
```
<br>

### Install dependencies
```
composer install
```
or 

```
composer update
```
<br>

### Create .env file
```
cp .env.example .env
```
<br>

### Generate application key
```
php artisan key:generate
```
<br>

### Edit .env 
Change the database credentials to match yours
<br>

### Migrate and Seed the database
```
php artisan migrate --seed
```
<br>


### Launch application
```
php artisan serve
```
<br>


## Set-up using sail

### Clone the repo 
```
gh repo clone josh-boat365/poynt-hackathon
```
or

```
git clone git@github.com:josh-boat365/poynt-hackathon.git
```
<br>

### Install dependencies
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
<br>

### Create .env file
```
cp .env.example .env
```
<br>

### Generate application key
```
sail artisan key:generate
```
<br>

### Edit .env 
Change the database credentials to match yours
<br>

### Migrate and Seed the database
```
sail artisan migrate --seed
```
<br>



* [API Documentation](https://documenter.getpostman.com/view/16424228/2s9YsGhDL7#1d221d69-29e3-49da-b131-4e13f67a8405)
