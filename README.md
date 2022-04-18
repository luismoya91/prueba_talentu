Prueba Tecnica para Talentu -- Luis Moya

Pasos para desplegar el proyecto

1. Clonar el repositorio
2. Entrar en él, y ejecutar composer install
3. Crear base datos talentu
4. Copiar .env.example a .env 
5. Ejecutar php artisan migrate
6. Ejecutar php artisan db:seed
7. Ejecutar php artisan serve
8. Por Postman ir a http://127.0.0.1:8000/api/register
    Metodo POST
    {
        "name" : "luis moya",
        "password" : "Colombia123",
        "password_confirmation" : "Colombia123",
        "email" : "luismoya@prueba.com"
    }
9. Por postaman http://127.0.0.1:8000/api/login se obtiene el token
    {
        "email" : "luismoya@prueba.com",
        "password": "Colombia123"
    }
10. Por postman con token http://127.0.0.1:8000/api/candidato es RESTFUL

11. Por postman con token http://127.0.0.1:8000/api/oferta es RESTFUL
