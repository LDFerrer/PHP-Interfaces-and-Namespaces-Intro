<?php
// Obtengo la URL del navegador
$url = $_GET['url'];

// Aquí guardaré la ruta final del script que procesará la solicitud
$endPoint = NULL;

// Verifico que exista el archivo de rutas, de ser así: LO CARGO; sinó: 
$routes = is_readable( $file = __DIR__.'/routes.php' ) && require_once( $file );

// Si no hay rutas definidas, lanzo un error.
!$routes && print('No has creado el archivo de rutas');

$endPoint = !!$routes[ $url ] ? ( __DIR__ . $routes[ $url ] ) : FALSE;

// Verifico que el EndPoint solicitado exista:
$endPoint && is_readable( $endPoint ) && require_once( $endPoint );