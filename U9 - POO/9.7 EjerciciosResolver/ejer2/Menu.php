<!-- Confeccionar una clase Menu, con los atributos titulo y enlace (ambos son arrays). 
Crear los métodos necesarios que permitan añadir elementos al menú. 
Crear los métodos que permitan mostrar el menú en forma horizontal o vertical (según que método llamemos). -->

<?php class Menu
{
    //Atributos
    private $titulo;
    private $enlace;
    //metodos
    public function __construct($tit,$enl)
    {
        $this->titulo [] = $tit;
        $this->enlace [] = $enl;
    }
    //Añadir nuevos elementos
    public function anadirTitulo($titulo,$enlace){
        $this->titulo [] = $titulo;
        $this->enlace [] = $enlace;
    }

    public function mostrarHorizontal (){
        for ($i=0; $i <count($this->titulo) ; $i++) { 
            echo " || Titulo:".$this->titulo[$i]." Enlace:".$this->enlace[$i];
        }
    }

    public function mostrarVertical(){
        for ($i=0; $i <count($this->titulo) ; $i++) { 
            echo "Titulo:".$this->titulo[$i];
            echo "<br>";
            echo " Enlace:".$this->enlace[$i];
            echo "<br>";
        }
    }


}