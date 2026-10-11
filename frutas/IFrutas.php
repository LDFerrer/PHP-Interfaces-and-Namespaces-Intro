<?php

interface IFrutas {
    public function sonido();
}
interface ICaracteristicas{
    public function setForma(string $forma);
    public function setTamaño(float $tamaño);
    public function setColor(string $color);
    
}
