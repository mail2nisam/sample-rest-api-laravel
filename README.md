
# Simaple store REST API Using Laravel

## Stack
- PHP Laravel
- Mysql
- Docker

## How to set it up!
- Make sure docker is installed in your dev machine
- Clone this repository `git clone <repository>`
- Navigate to project folder
- RUN `./vendor/bin/sail up`
- For more help please refer : https://laravel.com/docs/9.x#getting-started-on-macos

- Access the app using http://localhost

## Database and Data seeding

- ssh to php docker  container using `docker exec -it example-app-laravel.test-1 /bin/bash`
- check the container name  using `docker ps` command
- `php artisan migrate`
- `php artisan db:seed ` - seed date for user,category and products

## API End Points

### Categories
- `GET - /api/categories`
- `GET - api/categories/{id}`
- `POST - api/categories`
- `PUT - api/categories/{id}`
- `DELETE - api/categories/{id}`

### Products
- `GET - /api/products`
- `GET - api/products/{id}`
- `POST - api/products`
- `PUT - api/products/{id}`
- `DELETE - api/products/{id}`

### Cart
- `POST - /api/carts/products/{product-id}` - Add iteems to the cart
- `GET - /api/carts` - Show current user's cart items
### Order
- `POST -  /api/order` - Create order from current cart
- `GET - /api/order/{order-id}` - Show order by id


### Sample Curl fro API request
- Add product to the cart
```
curl --location --request POST 'http://localhost/api/carts/products/3' \
--header 'Content-Type: application/json'
```

- Create Order
```
curl --location --request POST 'http://localhost/api/order' \
--header 'Content-Type: application/json'
```
- Show order by id
```
curl --location --request GET 'http://localhost/api/order/1'
```

