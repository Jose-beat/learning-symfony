# Proyecto de Practica Symfony

Este proyecto es una practica para el entrenamiento en symfony.

Para crear este proyecto y configurarlo de manera correcta se sigue lo siguiente:

1. Tener PHP, SQL y APACHE instalados en el sistema (Se puede usar WAMPP, XAMPP o MAMPP).

2. Tener Composer instalado  y ya configurado en el equipo.

Ahora localizandonos en la carpeta de raiz del servidor (www, htdocs, etc. Segun sea servidor) colocaremos el comando de instalacion que es siguiente:

    htdocs % composer create-project symfony/website-skeleton learning-symfony

Con esto ya crearemos el proyecto de symfony  a partir de Composer.

Despues de esto vamos a instalar un paquete necesario para usar symfony con el servidor de apache.

Para utilizar el paquete ejecutamos el siguiente comando: 

    htdocs % sudo composer require symfony/apache-pack

Despues de la instalacion ya podremos ejecutar la aplicacion llendo al directorio **public/** dentro de la carpeta del proyecto.

En mi caso es _http://localhost/learning-symfony/public/_

_**Nota: En caso de usar sistemas UNIX como Linux o MacOS siempre darle a todos los elementos de la carpeta permisos de escritura y lectura para evitar errores al modificar los archivos.**_



## Crear un Host Virtual en Apache

Crear un host virtual consta de crear un host solo dedicado a nuestra app, algo asi como una URL virtual  con su dominio y similar por lo que tendremos que tocar archivos de configuracion en APACHE.

1. Primero vamos a ubicar los archivos de configuracion de Apache (En mi caso estan en /Applications/XAMPP/etc) y abriremos el archivo httpd.conf para activar los Host Virtuales, solo queda descomentar una linea similar a esta:
    `#Virtual hosts`
Abajo veremos la ruta donde se localizara la configuracion de los host virtuales, en mi caso es _etc/extra/httpd-vhosts.conf_.

Veremos una seccion de configuracion el cual debemos copiar y adaptar a nuestro proyecto, en mi caso seria el siguiente:


    <VirtualHost *:80>
        ServerAdmin uri_055@hotmail.com
        DocumentRoot "/Applications/XAMPP/htdocs/learning-symfony/public"
        ServerName learning-symfony.example.com
        ServerAlias www.learning-symfony.example.com
        <Directory "/Applications/XAMPP/htdocs/learning-symfony/public">
            Options Indexes FollowSymLinks
            AllowOverride All
            Order Deny,Allow
            Allow from all
        </Directory>
        ErrorLog "logs/dummy-host2.example.com-error_log"
        CustomLog "logs/dummy-host2.example.com-access_log" common
    </VirtualHost>

Guardamos esta configuracion y vamos a ir al ultimo archivo de configurarion que seria el archivo Hosts, el cual registra los dominios registrados, varia su ubicacion segun el sistema, en mi caso esta en _/private/etc_ llamado **hosts.**

Lo abrimos con cualquier editor de codigo y en la ultima linea colocamos:

    127.0.0.1       learning-symfony.example.com 

Usando el alias y la IP local para registrar nuestro dominio. Ahora solo queda reiniciar el servidor apache e intentamos acceder a este dominio.
        
# Pasos iniciales con symfony

Primero veremos las propiedades de los comandos en symfony, los cuales se basan en el siguiente comando que es el:

    php bin/console help

El comando anterior nos ayuda a desplegar la lista de comandos mas comunes usados

Vamos a crear un controlador usando:
    php bin/console make:controller <Nombre del controlador>

Con este comando creamos el controlador y una vista perteneciente a este.

Con el objetivo de centrar las rutas vamos a buscar el archivo *routes.yaml* en la ruta _config/_ 

