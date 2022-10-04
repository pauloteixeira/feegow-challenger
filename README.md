# FEEGOW CHALLENGER
Desafio técnico para cargo de arquitetura na Feegow

## TECNOLOGIAS
- NGINX
- PHP7.3-fpm
- Laravel
- MariaDB
- Docker

## INICILIZAÇÃO DA APLICAÇÃO
Para inicializar o projeto você precisará ter o docker na sua maquina para poder usar o docker-compose.

OBS. 
- Você precisa garantir que nenhum serviço, ou do docker, ou algo como nginx, apache, iis esteja utilizando a porta 80 da sua maquina, e também será necessário que a porta 3306 esteja liberada, pois o Docker vai iniciar o nginx desse projeto nestas portas da sua maquina.
- Caso tenha o mysql localmente rodando na maquina que fará o teste, alterar a porta da imagem do docker no arquivo docker-compose.yml
- Será necessário ter o php e o composer configurado na maquina de quem for testar. (Para instalação e configuração seguir instruções no link: https://getcomposer.org/download/)
- Para instalar o docker seguir as instruções no link: https://docs.docker.com/desktop/install/windows-install/

Caso não tenha o PHP e o composer na maquina, pode optar por executar o composer dentro da imagem do container, as instruições estarão na parte de INSTALAÇÃO DO LARAVEL

Tendo o Docker configurado e todos os pré-requisitos na maquina basta seguir os passos abaixo:

```bash
$ cd src
$ docker-compose up -d
```

O docker deverá ter criado os 3 containers a seguir:
- app
- serverapp
- db 

## CRIAÇÃO DO ARQUIVO DE VARIÁVEIS DE AMBIENTE
Será necessário criar o arquivo .env na raiz da pasta src do projeto.
Crie o arquivo e cole o conteúdo abaixo: (Obs. No atributo FEEGOW_API_TOKEN= trocar o valor TOKEN_API_FEEGOW pelo TOKEN de acesso da api.)

```bash
APP_NAME=Feegow
APP_ENV=local
APP_KEY=CC8BE9D2AC3A698FC5B79910A8E727F9
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_MIGRATE_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=feegow
DB_USERNAME=root
DB_PASSWORD=senhaFeegow2022

FEEGOW_API_TOKEN=TOKEN_API_FEEGOW
FEEGOW_URL_LISTA_ESPECIALIDADES=https://api.feegow.com/v1/api/specialties/list
FEEGOW_URL_LISTA_PROFISSIONAIS=https://api.feegow.com/v1/api/professional/list
FEEGOW_URL_LISTA_PATIENT_SOURCE=https://api.feegow.com/v1/api/patient/list-sources
```

## INSTALAÇÃO DO LARAVEL
Navegue até a pasta src do projeto e execute o comando abaixo:
```bash
$ composer install --ignore-platform-reqs
$ composer update
$ php artisan migrate
```

## UTILIZAR A APLICAÇÃO
Agora basta acessar localhost pelo navegador.
