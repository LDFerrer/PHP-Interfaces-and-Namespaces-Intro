<?php

trait TAnimal {
    public $sonido;
    public function setSonido( string $sonido ){
        $this->sonido = $sonido;
    }
}

trait TCaracteristicas {
    public int $patas;
    public string $colorPiel;
    public float $tamaño;

    public function setPatas( int $patas ){
        $this->patas = $patas;
    }

    public function getPatas(){
        return $this->patas;
    }

    public function setColorPiel( string $colorPiel ){
        $this->colorPiel = $colorPiel;
    }

    public function getColorPiel(){
        return $this->colorPiel;
    }

    public function setTamaño( string $tamaño ){
        $this->tamaño = $tamaño;
    }

    public function getTamaño(){
        return $this->tamaño;
    }
}

trait TCaracteristicasRaza {
    public string $colorPiel;
    public float $tamaño;
}