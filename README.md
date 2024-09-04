# Autocomplete Service

Этот проект работает с версией PHP (>= 8.1) и Laravel 10

## Начало работы

Предполагая, что вы уже установили на свой компьютер: Docker

``` bash
docker-compose up -d
```

После успешного запуска, выполните следующую команду:

``` bash
docker exec -it autocomplete_service_app bash
cp .env.example .env 
php artisan key:generate
```

### API Запрос

#### Поиск
- `GET http://localhost:8000/api/airports/search?query=Yamburg`
- **Пример query:**
    ```json
    {
      "query": "Yamburg"
    }
    ```
- **Пример response:**
    ```json
    HTTP/1.1 200 OK
    Content-Type: application/json
    {
      "data": {
        "ЯМБ": {
            "cityName": {
                "ru": "Ямбург",
                "en": "Yamburg"
            },
            "area": null,
            "country": "RU",
            "timezone": "Asia/Yekaterinburg"
        }
      }
    }
```