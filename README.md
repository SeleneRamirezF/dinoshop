# DinoShop.es
Esta web ha sido creada como Proyecto Integrado de fin de curso del Ciclo Superior de Desarrollo de Aplicaciones Web (DAW).  

## Título del Proyecto
DinoShop
## Descripción del proyecto
Este proyecto presenta una tienda online especializada en productos relacionados con la prehistoria y los dinosaurios.
## Contenido de la publicación
1. Archivos del proyecto en formato para el framework Laravel
2. Archivo Readme.md donde se encuentran las instrucciones para su instalacion y detalles del proyecto.
3. Directorio de imagenes con licencia creative commons que se usan en el proyecto.
4. Directorio de Manuales con el manual de usuario y de administrador de la tienda DinoShop.
## Desarrollo del proyecto
* Proyecto desarroyado en 2ºDaw, año 2021.
## Despliegue
* [Pagina principal del proyecto](https://github.com/SeleneRamirezF/dinoshop "Pagina principal del proyecto")
* [Pagina principal del autor](https://github.com/SeleneRamirezF "Pagina principal del autor")
## Construido con
* Visual Studio Code 
## Versionado
* 0.1
## Autora
* Selene Ramírez Fernández
## Licencia
* Sin licencia, uso educativo y gratuito.
* Imagenes con licencia Creative Common.
## Recursos adicionales:

* Como instalar el proyecto y hacerlo funcionar:
  
1. Lo primero que debes tener en cuenta es que Laravel es un framework para PHP, por lo cual debes contar con un servidor web:
   * Para Windows puedes usar WAMP O XAMPP
   * Para Linux puedes usar LAMP
    Recomiendo estos por que ya incluyen PHP y son completamente compatibles con la base de datos que usaremos.
2. Recomiendo tener instalado un IDE(Entorno de desarrollo integrado):
   * Visual Studio Code
3. Ahora clonamos el repositorio en nuestro area de trabajo local
   * dejo un enlace donde los explican paso por paso https://styde.net/clone-y-fork-con-git-y-github/
4. Una vez hayamos clonado el repositorio de nuestro proyecto Laravel en local, debemos hacer los siguientes ajustes para que éste pueda correr en nuestro equipo.
   * Instalar dependencias
      - Instalaremos con Composer, el manejador de dependencias para PHP, Para ello abriremos una terminal en la carpeta del proyecto y ejecutaremos:
        composer install
   * Crear una base de datos
     - El nombre que yo utilizé es tienda
   * Crear el archivo .env
      - Podemos duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos que indicamos en el paso anterior.
   * Ejecutar migraciones
      - ejecutamos las migraciones para que se generen las tablas con:
           php artisan migrate
    Ya tenemos nuestro proyecto listo para funcionar.




* [Link](https://github.com/SeleneRamirezF)
  
