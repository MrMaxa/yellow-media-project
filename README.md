## Local deploy

1) Run all containers

```
docker-compose up -d
```

2) Run migrations

```
docker exec yellow-media-php php artisan migrate
```

## Useful commands

PHP code style fixer
```
docker exec yellow-media-php ./vendor/bin/pint
```

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
