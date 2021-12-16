# simple-microservice-with-laravel
**Follow the step to start**
1. composer install
2. npm install && npm run dev
3. php artisan jwt:secret

> cd Apigateway

**Inside .env
Set the database environment for registration service in :**

DB_CONNECTION2=mysql  
    DB_HOST2=127.0.0.1  
    DB_PORT2=3306  
    DB_DATABASE2=  
    DB_USERNAME2=  
    DB_PASSWORD2=

**Set the base url of registration service:**


    REGISTRATION_SERVICE_BASE_URL:http://localhost:8001

**Now run migration and serve base service**

> php artisan migrate

> php artisan serve

**After setting up the Apigateway and running the base service, switch to register service directory and serve the project after setting up the connection for register service and run migrating.**

> cd ../registrationService

> php artisan migrate

>php artisan serve
