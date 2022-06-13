# Setup Docker Para Projetos Laravel

Crie o Arquivo .env

```sh
cd example-project/
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env

```dosini
APP_NAME=Panagora
APP_URL=https://assembleia.api.pandora.com.br

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=panagora
DB_USERNAME=panagora
DB_PASSWORD=pan123

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Suba os containers do projeto

```sh
docker-compose up -d
```

Acessar o container

```sh
docker-compose exec panagora bash
```

Instalar as dependências do projeto

```sh
composer install
```

Gerar a key do projeto Laravel

```sh
php artisan key:generate
```

```sh
php artisan jwt:secret
```

```sh
php artisan migrate
```

```sh
php artisan migrate:refresh --seed
```

Acesse o projeto

```sh
(https://assembleia.api.pandora.com.br)
```

Gerar o Token

```sh
(localhost:8180/api/gera-token-integracao)
```

Criar um Votante

```sh
(localhost:8180/api-assembleia/tag/Organizador/paths/evento/post)
```

Lista um Evento

```sh
(localhost:8180/api-assembleia/tag/Organizador/paths/evento/7747/votante/get)
```

Lista um Votante

```sh
(localhost:8180/api-assembleia/tag/Organizador/paths/evento/7747/votante/5/get)
```

Rodando os Testes

```sh
docker-compose exec panagora bash
```

```sh
./vendor/bin/phpunit
```
