## Local deploy

1) Create .env file

```
cp .env.example .env
```

2) Run all containers

```
docker-compose up -d
```

3) Install project dependencies

```
docker exec yellow-media-php composer install
```

4) Run migrations

```
docker exec yellow-media-php php artisan migrate
```

5) Run test data seeder

After command execution, 2 users will be available for use

- User with companies: <br>
Login: company-user@gmail.com <br>
Password: 12345678


- Empty user: <br>
Login: empty-user@gmail.com <br>
Password: 12345678 

```
docker exec yellow-media-php php artisan db:seed --class=TestDataSeeder
```

## Useful commands

PHP code style fixer
```
docker exec yellow-media-php ./vendor/bin/pint
```

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
