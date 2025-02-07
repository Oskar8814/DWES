<!-- Confeccionar una clase Empleado con los atributos nombre y sueldo.
Definir un método “asigna” que reciba como dato el nombre y sueldo y actualice los atributos 
(debe comprobar que el nombre recibido coincide con el atributo nombre y si es así actualiza el atributo sueldo con el sueldo recibido).
Plantear un segundo método que imprima el nombre y un mensaje si debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos). -->

<?php class Empleado{
    // atributos
    private $nombre;
    private $sueldo;

    //metodos
    public function __construct($nom,$sue)
    {
        $this->nombre = $nom;
        $this->sueldo = $sue;
    }
    public function asigna($nombre,$nuevoSue){
        if ($this->nombre === $nombre) {
            $this->sueldo = $nuevoSue;
        }else {
            echo "El nombre no coincide";
        }
    }
    public function impuestos(){
        echo "Nombre: ".$this->nombre;
        if ($this->sueldo > 3000) {
            echo "<br>";
            echo "Debe pagar impuestos";
        }else {
            echo "<br>";
            echo "No debe pagar impuestos";
        }
    }
}

