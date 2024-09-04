### Клонирование репозитория

```bash
git clone https://github.com/George-Karpenko/TestAmoPoint.git

```

### Запуск контейнеров

Запустите контейнеры с помощью docker-compose

```bash
$ docker-compose up -d
```

docker нужен только в папке 1 и 3.
Во второй папке приложение на js.

В третьем проекте миграции и сиды запускаются через адрес в браузере.

```bash
http://localhost:8000/?migrate
http://localhost:8000/?seed
```
