# Setup Projeto Panagora

Clone o Projeto

```sh
git clone https://github.com/squintal73/panagora_producao.git

```

Crie o Arquivo .env

```sh
cd panagora_producao/
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
DB_USERNAME=panuser
DB_PASSWORD=pan@123

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

Construa e Suba os containers do projeto

```sh
docker-compose build
```

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

Gerar a key do JWT

```sh
php artisan jwt:secret
```

Gerar o Banco de Dados

```sh
php artisan migrate
```

Rodar O Seeder

```sh
php artisan migrate:refresh --seed
```

Acesse o projeto

```sh
https://assembleia.api.pandora.com.br
```

Gerar o Token para acessar a API

Body -> Form-data

KEY -------------- VALUE
email ------------ panagora@panagora.com.br
password --------- p@nagor@2022

```sh
https://assembleia.api.pandora.com.br/api/gera-token-integracao

```

Criar um Votante

```sh
https://assembleia.api.pandora.com.br/api-assembleia/tag/Organizador/paths/evento/post
```

Lista um Evento

```sh
https://assembleia.api.pandora.com.br/api-assembleia/tag/Organizador/paths/evento/{codigo_evento}/votante/get
```

Lista um unico Votante

```sh
https://assembleia.api.pandora.com.br/api-assembleia/tag/Organizador/paths/evento/{codigo_evento}/votante/{id}/get
```

Geração de Documentos

```sh
https://assembleia.api.pandora.com.br/api-assembleia/tag/Organizador/paths/evento/assembleia/
```

Rodando os Testes

```sh
docker-compose exec panagora bash
```

```sh
./vendor/bin/phpunit
```
