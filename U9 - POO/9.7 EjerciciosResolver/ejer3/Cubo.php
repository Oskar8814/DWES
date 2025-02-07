<!-- Crear una clase cubo que contenga información sobre la capacidad y su contenido actual en litros. Se podrá 
consultar tanto la capacidad como el contenido en cualquier momento. Dotar a la clase de la capacidad de verter 
el contenido de un cubo en otro (hay que tener en cuenta si el contenido del cubo origen cabe en el cubo destino, 
si no cabe, se verterá solo el contenido que quepa). Hacer una página principal para probar el funcionamiento 
con un par de cubos. -->
<?php Class Cubo {
    //Atributos
    private $capacidad;
    private $contenido;

    public function __construct($cap, $cont)
    {
        $this ->capacidad = $cap;
        $this ->contenido = $cont;
    }

    //Metodos
    function verCapacidad() {
        return $this->capacidad;
    }
    function verContenido() {
        return $this->contenido;
    }

    public function setContenido($cont)
    {
        $this->contenido = $cont;
        return $this;
    }
    
    //Verter de cubo 1 a cubo 2
    function verter(Cubo $cubo2){
        $espacioDisponible = $cubo2->verCapacidad() - $cubo2->verContenido();
        if ($espacioDisponible >= $this->verContenido()) {
            $cubo2->contenido+=$this->contenido;
            $this->contenido = 0;
        }else {
            $cubo2->contenido += $espacioDisponible;
            $this->contenido -= $espacioDisponible;
        }
    }


}