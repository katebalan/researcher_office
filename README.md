# Research office project

* Symfony 5
* MySql
* Docker
* Doctrine

## Install

1. Clone project and enter to the project's folder
2. Build docker images
```bash
docker-compose build
```
3. Start all containers
```bash
docker-compose up -d
```
4. Enter the ro_php container and create database
```bash
docker exec -it ro_php bash
./bin/console doctrine:database:create
```
5. Run migrations and run fixtures (optional)
```
./bin/console doctrine:migartion:migrate
./bin/console doctrine:fixtures:load
```

## Webpack

``` bash
yarn encore dev
yarn encore dev --watch
yarn encore production
```

## CS fixer

* check if everything is ok
    ``` bash
    composer cs-check
    ```
* make everything according code style configuration
    ``` bash
    composer cs-fix
    ```
