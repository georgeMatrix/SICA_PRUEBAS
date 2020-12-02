# Sistema Integral de Control Académico

>Referencia Sistema de roles y permisos de [Jhonatan David Fernandez Rosa(You Tube)](https://www.youtube.com/playlist?list=PLtg6DxcGyHSvB6xvQbacVfL83UoFEvOGz)

>Referencia Sistema de Pokemon traines de [Raul Palacios(You Tube)](https://youtu.be/naJklgh-ZLs)

### Mejoras implementadas:


- [x] Uso de la plantilla [Adminlte](https://github.com/ColorlibHQ/AdminLTE/releases/tag/v3.0.5) - Datatables.js


## Instalacion  
1. Instalar [Wamp(Solo Windows)](https://www.wampserver.com/en/) , 
  [Xampp](https://www.apachefriends.org/es/index.html),
  [MAMP](https://www.mamp.info/en/windows/) u otro segun su preferencia 
2. Instalar composer [Descargar composer](https://getcomposer.org/download/)
3. Clonar el repositorio en el directorio de tu eleccion
>git clone git@bitbucket.org:upfim/sica_v.21.1.git
4. Instalar composer  
>composer install 
5. Cambiar el nombre del archivo **.env.example** a **.env**
7. Crear una base de datos en phpMyAdmin y configurar el archivo .env 
   * DB_CONNECTION=mysql
   * DB_HOST=127.0.0.1   
   * DB_PORT=3306
   * DB_DATABASE=Nombre de Base De Datos Creada En phpMyAdmin
   * DB_USERNAME=Nombre de Usuario en phpMyAdmin
   * DB_PASSWORD=Contraseña en phpMyAdmin
#### En mi caso es:

   * DB_CONNECTION=mysql
   * DB_HOST=127.0.0.1
   * DB_PORT=3306    
   * DB_DATABASE=inven 
   * DB_USERNAME=root    
   * DB_PASSWORD=
7. Generar una nueva llave de laravel con el comando:
>php artisan key:generate

8. Ejecutar migraciones con el siguiente comando: 
>php artisan migrate

9. Ejecutar seeder para alimentar la base de datos con el comando:

>php artisan db:seed --class=RoleUserSeeder

10. Ejecutar el proyecto: 
>php artisan serve

11. Entrar a [http://127.0.0.1:8000](http://127.0.0.1:8000) para ingresar al proyecto hacer click en login y entrar con:
	```php
    E-Mail Address: admin@admin.com
    ```
    ```php
    Password: 1234 
    ```
12. Comandos para verificacion de test
	```php
	php artisan test
	```
	
	```php
	php vendor/phpunit/phpunit/phpunit
	```
	
