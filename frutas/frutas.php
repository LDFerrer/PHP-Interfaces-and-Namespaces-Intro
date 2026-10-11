<?php
interface IFrutas{
    public function sabor();
}

trait TFrutas{
    public $sabor;
    public function setSabor(string $sabor){
        $this->sabor = $sabor;
    }
}


trait TCaracteristicas{
    public string $forma;
    public string $color;
    public float $tamaño;
}

class Frutas implements IFrutas{
    use TFrutas;
    protected string $nombre;
    
    public function __construct(string $nombre){
        $this-> nombre = $nombre;
    }
    public function sabor(){
        return $this->sabor;
    }
    
}

$manzana = new Frutas('manzana');
$manzana->SetSabor('dulce');
echo $manzana->sabor();
