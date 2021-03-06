

# Sistema de Control de Asistencia (SISCOA).

SISCOA fue diseñado para la Universidad Nacional de Costa Rica como parte de una beca universitaria con el beneficio de poder compartir su código. SISCOA permite a los usuarios crear formularios que gestionan la asistencia a reuniones o actividades. Las personas pueden acceder a estos formularios para registrarse por medio de un enlace que genera el sistema, además, cuenta con un pequeño sistema de roles para controlar las acciones que pueden realizar los usuarios dentro del programa, así como botones de acciones los cuales permiten observar las personas que se han registrado en el formulario, crear un PDF basado en un formulario, entre otras.

## Pre-requisitos e instalación.

### Pre-requisitos
```
1. MySQL como base de datos.
2. Un servidor web.
3. PHP versión 7.
4. Composer y NPM.
```
### Instalación
```
1. Clonar el repositorio.
2. Ejecutar los siguientes comandos en consola dentro del folder del proyecto:
    - composer install
    - npm install
    - Linux: cp .env.example .env       Windows: copy .env.example .env
    - php artisan key:generate
3. Crear una base de datos y configurar en el archivo .env los parámetros necesarios como el nombre de la base de datos, usuario y contraseña.
4. Realizar migraciones ejecutando el comando:
    - php artisan migrate --seed
5. Ejecutar el servidor local con el comando:
    - php artisan serve
```
## Usuarios
SISCOA nace con 3 usuarios con roles distintos:
    
    Email                   Contraseña            Rol
    admin@gmail.com         password              Administrador
    cvf@gmail.com           password              Funcionario
    mcg@gmail.com           password              Oyente
    
 Solamente pueden iniciar sesión en el sistema los usuarios con rol de administrador o de funcionario, el oyente solamente tiene derecho a registrar asistencia mediante un enlace de formulario. Además, si un administrador cambia
 el estado de un usuario a inactivo, este tampoco podrá ingresar al sistema.

## SISCOA fue desarrollado con las siguientes tecnologías: 
    • Laravel 7
    • Vue js
    • DomPDF
    • AdminLTE
## Autor
Jefferson Hernández Flores.

