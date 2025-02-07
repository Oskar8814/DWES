<!-- Creamos  la  clase  factura  con  el  atributo  de  clase  IVA  (21)  y  los  atributos  de  instancia  ImporteBase,  fecha, 
estado (pagada o pendiente) y productos (array con todos los productos de la factura, que contiene el nombre, 
precio y cantidad). -->

<!-- Define los métodos AñadeProducto, ImprimeFactura y los getters  y setters de los atributos ImporteBase (solo 
getter, pues su contenido se actualiza automaticamente), fecha y estado. -->

<?php class Factura
{

    //atributo de clase
    private static $iva = 21;

    //Atributos Instancia
    private $importeBase;
    private $fecha; // tipo date.
    private $estado; //pagada o pendiente
    private $productos;// Array de productos (nombre, precio, cantidad)

    //constructor
    public function __construct($fecha, $estado = "pendiente" )
    {
        $this->importeBase = 0.0; //Iniciarlo a 0
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->productos = [];

    }

    //Getter y setters
    public function getImporteBase()
    {
        return $this->importeBase;
    }
    
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIva()
    {
        return $this->iva;
    }

    //metodos

    public function añadeProducto($nombre, $precio, $cantidad) {
        $this->productos[]=[
            "nombre" => $nombre,
            "precio" => $precio,
            "cantidad" => $cantidad
        ];
        $this->actualizarImporteBase();
    }

    //Modificarlo para no hacer echo sino que devuelva una variable con el codigo html y lo mostramos en el index
    public function ImprimeFactura(){
        // echo "-- Factura --<br>";
        // echo "Fecha: {$this->fecha}<br>";
        // echo "Estado: {$this->estado}<br>";
        // echo "Productos de la Factura:<br>";

        // foreach ($this->productos as $key => $producto) {
        //     echo "{$producto['nombre']} (Precio: {$producto['precio']}, Cantidad: {$producto['cantidad']})<br>";
        // }

        // echo "Importe Base: {$this->importeBase}<br>";
        // echo "IVA:".Factura::$iva;
        // $importeTotal = $this->importeBase*(Factura::$iva/100) + $this->importeBase;
        // echo "<br>Importe Total:{$importeTotal}";


        $html = "-- Factura --<br>";
        $html .= "Fecha: {$this->fecha}<br>";
        $html .= "Estado: {$this->estado}<br>";
        $html .= "Productos de la Factura:<br>";

        foreach ($this->productos as $key => $producto) {
            $html .= "{$producto['nombre']} (Precio: {$producto['precio']}, Cantidad: {$producto['cantidad']})<br>";
        }

        $html .= "Importe Base: {$this->importeBase}<br>";
        $html .= "IVA:" . Factura::$iva;
        $importeTotal = $this->importeBase * (Factura::$iva / 100) + $this->importeBase;
        $html .= "<br>Importe Total:{$importeTotal}";

        return $html;
        
    }

    private function actualizarImporteBase() {
        $this->importeBase = 0.0;
        foreach ($this->productos as $producto) {
            $this->importeBase += $producto['precio'] * $producto['cantidad'];
        }
    }



}