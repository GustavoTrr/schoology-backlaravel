# SCHOOLOGY AUTOCOMPLETE LARAVEL-BACKEND

## EXPLANAITION
This is a Service created to respond for autocomplete UI components

### ASSETS
 - PHP 8.2
 - LARAVEL 9.5
 - COMPOSER

### REQUIREMENTS | PRE-REQUIESITES
 - DOCKER and DOCKER-COMPOSE

### INSTALATION & EXECUTION
1. Download the repository
2. Open the terminal on the root folder of the project
3. execute the command
```bash
docker-compose up -d
```

* As it run on 8000 port, make sure that this port is available

### USE
* To access the service, use the url below
http://localhost:8000/api/autocomplete?q=<searchedWord>

### TESTS
* To run the tests, just enter the docker container with interactive terminal 
```bash
docker exec -it schautocompletebe bash
```

and call for the tests
```bash
php artisan test
```