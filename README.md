
## Instalación
- Para la instalación es necesario tener en consideración que la versión del PHP deberá ser mayor o igual a 7.4.

- Es necesario del mismo modo tener composer actualizado.

## Instalación en Windows

Una vez teniendo el proyecto en su máquina, necesitará crear un archivo con la extensión .env,
en el directorio, es recomendable copiar el archivo .env.example y quitarle la extensión .example. 
Habiendo realizado ello ejecutar el siguiente comando en el terminal:
- $ php artisan key:generate  (Permitirá crear una clave local para poder trabajar de manera local)

Para migrar las bases de datos es necesario que se cree una base de datos con un nombre específico, y ese nombre colocarlo en el administrador de mysql en el archivo .env, así como sus credenciales de base de datos local, luego el siguiente comando migrará las tablas ala base de datos:
- $ php artisan migrate

En caso se necesite reiniciar las migraciones y limpiar todo, aplicar:
- php artisan migrate:refresh



## Instalación en Ubuntu
