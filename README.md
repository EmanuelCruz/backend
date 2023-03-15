# API REST START WARS

API REST hecha con Laravel version 8 y MySQL.

Luego de tener el proyecto funcionando, debe crear un usuario y logearlo para obtener un token y poder consultar los endpoints de person, planets y vehicles.

### Pasos para ejecutar proyecto

1. Crear el archivo .env

    ```
    copy .env.example .env
    ```
2. Cargar las librerias

    ```
    composer update
    ```
3. Generar una key csrf

    ```
    php artisan key:generate
    ```
4.  Crear una base de datos y modificar las variables de entorno en el archivo .env

    ```
    php artisan migrate:fresh --seed
    ```
5. Arrancar el servidor web

    ```
    php artisan serve
    ```
6. Para poder hacer consultas a los endpoints person, planets y vehicles, es necesario registrarse y luego logearse para obtener el token de autorizacion. Este se tendra que pasar como un Bearer Token en el Postman.

### Ejemplo de consultas

- Registro de usuario

    Debe ingresar un 4 valores: name, email, password

    ```
    http://localhost:8000/api/register
    ```
- Login de usuario

    Debe ingresar un 4 valores: email, password

    ```
    http://localhost:8000/api/login
    ```

- Person (es necesario un token)

    Obtener todo los personajes de Star Wars. Debe modificar el valor de page si necesita ver el resto de los personajes

    ```
    http://localhost:8000/api/person?page=1
    ```


    Obtener un personaje de Star Wars.

    ```
    http://localhost:8000/api/person/1
    ```
- Vehicles (es necesario un token)

    Obtener todo los vehiculos de Star Wars. Debe modificar el valor de page si necesita ver el resto de los vehiculos

    ```
    http://localhost:8000/api/vehicles?page=1
    ```


    Obtener un vehiculo de Star Wars.

    ```
    http://localhost:8000/api/vehicles/4
    ```

- Planets (es necesario un token)

    Obtener todo los planetas de Star Wars. Debe modificar el valor de page si necesita ver el resto de los planetas

    ```
    http://localhost:8000/api/planets?page=1
    ```


    Obtener un planeta de Star Wars.

    ```
    http://localhost:8000/api/planets/4
    ```