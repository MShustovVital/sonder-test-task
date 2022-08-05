## Deploy instruction

1. Run composer install command inside directory
2. Create .env file (you can clone .env.example)
3. After it run command "docker-compose up -d"
4. Make sure than all containers available using command "docker ps"
5. Run command "docker exec -it sonder_app php artisan migrate --seed" to fill database
6. Go to link http://localhost:8080/api/cube, to make sure, than you can see a cube by json format
7. If you want rotate cube, you need send POST request to http://localhost:8080/api/cube/rotate, with param side ('L','M','R')
8. You can use command  "docker exec -it sonder_app php artisan test" if you want to run unit/feature application tests

In current program version, you can only rotate cube by up vertical axis, but i leaved abstractions and logic for implement another types of rotation 
