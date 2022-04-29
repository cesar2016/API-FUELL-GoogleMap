<p align="center"><a href="#"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center"> 
<h1><a>GEOLOCALIZACION DE ESTACIONES DE SERVICIO</a></h1>
</p>



<p align="center">
    <img src="https://i.postimg.cc/4ykqrQ12/Whats-App-Image-2022-04-29-at-5-01-22-PM.jpg" border="0"> 
</p>
<hr> 
<p align="center">
    <img src="https://i.postimg.cc/vmTJ9BBh/Whats-App-Image-2022-04-29-at-5-01-48-PM.jpg" border="0"> 
</p>   
<hr> 
<p align="center">
    <img src="https://i.postimg.cc/1tNbCjDN/Whats-App-Image-2022-04-29-at-5-03-36-PM.jpg" border="0">
</p>
<hr>
<p align="center">
    <img src="https://i.postimg.cc/VkKydMY5/Whats-App-Image-2022-04-29-at-5-04-11-PM.jpg" border="0">
</p>
<hr>

## SOBRE ESTE PROYECTO "API REST FULL CON LARAVEL" 

Se creo una API REST FULL con laravel, generando dos Modesl: "Clients y Producs" con los cuales se han generado endpoints para crear un CRUD trabajandolo desde la aplicacion POSTMAN, tambien se consumio una API esterna para consultar y cargar la base de datos con datos de diferentes estaciones de Servicio del pais de MEXICO y tambien se utilizo otra pequeña API para consultar la cotizacion actual del U$D para Argentina .

Cuenta con una pagina inicial PUBLICA en donde muestra todo el grupo de Estacioens de seervicio en un mapa de Google Map y un formulario dende poder generar busquedas unificadas por Codigo Postal trayendo info del comercio, como Razon social, precios de los cumbustibles, direccion etc.

- Sistema de Logueo con jetStream.
- Frotend y estilos otorgados con bootstraps 4.
- Ruteo de los endpoints en routes/api.php
- Uso de servidor LARAGON y gestor de DB MySql MS.
- Consultas a API del U$D externa https://api-dolar-argentina.herokuapp.com/api/dolaroficial con "guzzlehttp/guzzle": "^7.3".

Para utilizar este repositorio
1)_ Clonarlo en Local
2)_ Intalarlar dependencias a travez del comando composer install
3)_ Crer base de datos y configur dicha base en el archivo .env
4)_ Correr migraciones con el comando php artisan migrate 
5)_ Generar Key con el comando php artisan key:generate
6)_ Correr el proyecto con el comando php artisan serv

 
 

## cesars.pro@gmail.com
## Linkedin: https://www.linkedin.com/in/cesar-sanchez-dev/

