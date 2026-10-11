<?php

interface IAnimal {
    public function sonido();
}

interface ICaracteristicas {
    public function setPatas( int $numeroPatas );
    public function setColorPiel( string $colorPiel );
    public function setTamaño( string $tamaño );
}