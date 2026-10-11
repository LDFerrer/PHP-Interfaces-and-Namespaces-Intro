<?php


is_readable( $file = __DIR__ . '/IFrutas.php' ) && require_once( $file );
is_readable( $file = __DIR__ . '/frutas.php' ) && require_once( $file );

class fruta implements IFrutas {
    use TFrutas;
    protected string $nombre;
   

    public function __construct( string $nombre ){
        $this->nombre = $nombre;
       
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
  
    
    public function sonido(){
        return $this->sonido;
    }

    public function __toString(){
        $descripcion = NULL;
        
        if( $this->nombre ){
            $descripcion.= "$this->nombre ";
        }

        return $descripcion;
    }
}

class Manzana extends fruta {
    public function sabor(){
        return 'Dulce!';
    }
}

class Manzanass extends Manzana implements IFrutas {
    use TCaracteristicas, TCaracteristicasRaza;

    public $colorManzana;

    public function __construct( string $nombre, public string $forma, public string $color, public float $tamaño; ){
        parent::__construct( $nombre );
        $this->setForma( $forma );
        $this->setColor( $color );
        $this->setTamaño( $tamaño );
        $this->colorManzana = 'Manzana Roja';
    }

    public function getColorManzana(){
        return $this->colorManzana;
    }

    public function __toString(){
        $descripcion = parent::__toString();
        
        if( $this->color ){
            $descripcion.= "La manzana es {$this->color} ";;
        }
        
      

        return $descripcion;
    }
}



$LaFruta = new Manzana( 'Es una Manzana Roja' );

echo "La fruta: $LaFruta ";