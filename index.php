<?php
define( 'DEPURACION', TRUE );

if( DEPURACION ){
    // Modo de pruebas
    error_reporting( -1 );
    ini_set( 'display_errors', 1 );
} else {
    // Modo de producción
    ini_set( 'display_errors', 1 );
    error_reporting(
        E_ALL
        & ~E_NOTICE
        & ~E_DEPRECATED
        & ~E_STRICT
        & ~E_USER_NOTICE
        & ~E_USER_DEPRECATED
    );
}

function removeDocumentRoot( string $str, string $documentRoot = __DIR__ ){
    return str_ireplace( $documentRoot, '', $str );
}

function errorControl( $errNo, $errStr, $errFile, $errLine ){
    $errorFile = removeDocumentRoot( $errFile );
    $errorString = removeDocumentRoot( $errStr );
    echo( "<b>Error - En $errorFile:$errLine</b> [$errNo] $errorString" );
}

function exceptionControl( $e ){
    $errorFile = removeDocumentRoot( $e->getFile() );
    $errorString = removeDocumentRoot( $e->getMessage() );
    echo( "<b>Error - En {$errorFile}:{$e->getLine()}</b> {$errorString}" );
}

set_error_handler('errorControl');
set_exception_handler('exceptionControl');

// Obtengo la URL del navegador
$url = $_GET['url'] ?? FALSE;

// Aquí guardaré la ruta definida en routes.php
$endPoint = NULL;

// Aquí guardaré la ruta absoluta del script PHP que procesará la solicitud
$endPointScriptPath = NULL;

try {
    if( !$url ){
        // Procesar la página de inicio
    } else {
        // Verifico que exista el archivo de rutas, de ser así: LO CARGO; sinó: 
        $routes = is_readable( $file = __DIR__.'/routes.php' ) ? require_once( $file ) : FALSE;
        
        // Si no hay rutas definidas, lanzo un error.
        if( !$routes or !is_array( $routes ) ){
            throw new Exception('No has creado el archivo de rutas');
        }
    
        // Leo la ruta relativa definida en routes.php
        $endPoint = $routes[ $url ] ? $routes[ $url ] : FALSE;
    
        // Construyo la ruta absoluta a partir de $endPoint
        $endPointScriptPath = $endPoint ? ( __DIR__ . $endPoint ) : FALSE;
    
        // Verifico que el $endPointScriptPath solicitado exista:
        $isEndPointReadable = $endPointScriptPath && is_readable( $endPointScriptPath );
    
        if( !$isEndPointReadable ){
            throw new Exception('No se pudo leer el script que procesará el endPoint');
        }
    }
} catch ( Throwable $e ) {
    exceptionControl( $e );
}

$endPointScriptPath && require_once( $endPointScriptPath );