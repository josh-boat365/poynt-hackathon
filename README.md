# poynt-hackathon
This is a an ecommerce api using Laravel 

# Api Schema 
## Products
    name
    price
    descript
    category

product_images
   product_id
   image

users
 name
 email
 phone_number
 password
 role


categories
 name
 image

orders
 user_id
 date
 status ( pending -- person has not paid
 	  proccessing -- person has paid
 	  completed -- person has recieved product
 	  cancelled )
 	  
  

order_items
	product_id
	quantity
	amount
	order_id

transactions
	description
	amount
	refference
	metadata - json
	user_id
	order
	status (pending, success, failed)

# Zakvote [![CI](https://github.com/jjbofficial/zakvote/actions/workflows/laravel.yml/badge.svg?branch=main)](https://github.com/jjbofficial/zakvote/actions/workflows/laravel.yml)

## Local set-up instructions
* Set-up with composer
* Set-up using Docker(sail)


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



* API Documentation 
