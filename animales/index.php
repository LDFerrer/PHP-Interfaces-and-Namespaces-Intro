<?php

interface IAnimal {
    public function sonido();
}

trait TAnimal {
    public $sonido;
    public function setSonido( string $sonido ){
        $this->sonido = $sonido;
    }
}

interface ICaracteristicas {
    public function setPatas( int $numeroPatas );
    public function setColorPiel( string $colorPiel );
    public function setTamaño( float $tamaño );
}

trait TCaracteristicas {
    public int $patas;
    public string $colorPiel;
    public float $tamaño;
}

class Animal implements IAnimal {
    use TAnimal;
    protected string $nombre;
    protected int $edad;

    public function __construct( string $nombre, int $edad ){
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    public function sonido(){
        return $this->sonido;
    }
}

$perro = new Animal( 'perro', 15 );
$perro->setSonido( 'ladra' );
echo $perro->sonido();