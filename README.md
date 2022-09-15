# FEEGOW CHALLENGER
Desafio técnico para cargo de arquitetura na Feegow

## TECNOLOGIAS
- NGINEX
- PHP7.3-fpm
- Laravel
- MariaDB
- Docker

## INICILIZAÇÃO DA APLICAÇÃO
Para inicializar o projeto você precisará ter o docker na sua maquina para poder usar o docker-compose.

OBS. Você precisa garantir que nenhum serviço, ou do docker, ou algo como nginx, apache, iis esteja utilizando a porta 80 da sua maquina, pois o Docker vai iniciar o nginx desse projeto nesta porta da sua maquina.
Tendo o Docker configurado na maquina basta seguir os passos abaixo:

```bash
$ cd src
$ docker-compose up -d
```
## C0NFIGURANDO O BANCO DA APLICAÇÃO
Como banco de dados o Docker também irá montar um MySQL Server local para utilizar com essa aplicação. Após a fase anterior de inicialização da aplicação, você precisará criar uma senha no banco e criar o database e a tabela utilizando os scripts abaixo:

Autentique-se no banco mysql localhost -u root ou pela sua IDE favorita, e execute os scripts abaixo:

Abaixo vamos criar o database que a aplicação precisa.
```SQL
CREATE DATABASE feegow;
```

Abaixo vamos criar a tabela e alterar a senha de root para a senha que a aplicação vai utilizar, nas próximas conexões com a sua IDE você precisará inserir a mesma senha.
```SQL
USE feegow;
CREATE TABLE IF NOT EXISTS `feegow`.`appointments` (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    specialty_id INT UNSIGNED NOT NULL, 
    professional_id INT UNSIGNED NOT NULL, 
    name VARCHAR(255) NOT NULL, 
    cpf CHAR(14) NOT NULL, 
    source_id INT UNSIGNED NOT NULL, 
    birthdate DATE NOT NULL,
    date_time DATE NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

GRANT ALL ON feegow.* TO 'root'@'%' IDENTIFIED BY 'senhaFeegow2022';
FLUSH PRIVILEGES;
```
## UTILIZAR A APLICAÇÃO
Agora basta acessar localhost pelo navegador.