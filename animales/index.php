<?php

is_readable( $file = __DIR__ . '/interfaces.php' ) && require_once( $file );
is_readable( $file = __DIR__ . '/traits.php' ) && require_once( $file );

class Animal implements IAnimal {
    use TAnimal;
    protected string $nombre;
    protected int $edad;

    public function __construct( string $nombre, int $edad ){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getEdad(){
        return $this->edad;
    }
    
    public function sonido(){
        return $this->sonido;
    }

    public function __toString(){
        $descripcion = NULL;
        
        if( $this->nombre ){
            $descripcion.= "$this->nombre ";
        }
        
        if( $this->edad ){
            $descripcion.= "tiene $this->edad años ";
        }

        return $descripcion;
    }
}

class Perro extends Animal {
    public function sonido(){
        return 'guau!';
    }
}

class Labrador extends Perro implements ICaracteristicas {
    use TCaracteristicas, TCaracteristicasRaza;

    public $tipoRaza;

    public function __construct( string $nombre, int $edad, string $colorPiel, float $tamaño ){
        parent::__construct( $nombre, $edad );
        $this->setColorPiel( $colorPiel );
        $this->setTamaño( $tamaño );
        $this->tipoRaza = 'Labrador Retriever';
    }

    public function getTipoRaza(){
        return $this->tipoRaza;
    }

    public function __toString(){
        $descripcion = parent::__toString();
        
        if( $this->colorPiel ){
            $descripcion.= "es $this->colorPiel ";
        }
        
        if( $this->tamaño ){
            $descripcion.= "y mide {$this->tamaño} metros ";
        }

        return $descripcion;
    }
}

// $perro = new Animal( 'perro', 15 );
// $perro->setSonido( 'ladra' );

$miMascota = new Perro( 'Nerón', 6, 'Naranja', '1.5' );

echo "Mi mascota es $miMascota";