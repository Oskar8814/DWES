<?php
function voltea($num){
    $volteado = 0;
    while ($num >= 1) {
        $volteado = ($volteado*10)+($num%10);
        $num = $num/10;
    }
    return $volteado;
}

// esCapicua: Devuelve  verdadero si el número que  se pasa como  parámetro es capicúa  y falso en caso 
// contrario. 
function esCapicua($num){
    $numeroOriginal = $num;
    $numVolteado = voltea($num);
    $capicua = true;
    if ($numeroOriginal!=$numVolteado) {
        $capicua = false;
    }
    return  $capicua;
}

function esPrimo ($numero){
    $esPrimo = true;
    for ($i = 2; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false;
        }
    }
    // El 0 y el 1 no se consideran primos  
    if (($numero == 0) || ($numero == 1)) {
        $esPrimo = false;
    }
    return $esPrimo;
}
function siguientePrimo($num){
    $primo = $num ;
    do {
        $primo++; 
    } while (!esPrimo($primo));
    return $primo;
}
function potencia($base,$exp){
    $potencia = 1;
    for ($i=0; $i < $exp; $i++) { 
        $potencia = $potencia * $base;
    }
    return $potencia;
}

// digitos: Cuenta el número de dígitos de un número entero.
function digito($numero){
    $aux = 0;
    do {
        $numero=$numero/10;
        $aux++;
    } while ($numero>=1);
    return $aux;
}

// digitoN: Devuelve el dígito que está en la posición n de un número entero. Se empieza contando por el 
// 0 y de izquierda a derecha. 

function digitoN($numero, $position){
    $numero = abs($numero);
    $numero = voltea($numero);
    $dividido =(int) ($numero / pow(10,$position));
    $digito = $dividido % 10;

    return $digito;
}

// posicionDeDigito: Da la posición de la primera ocurrencia de un dígito dentro de un número entero. Si 
// no se encuentra, devuelve -1.

function posicionDeDigito($numero,$digito){
    $numero = abs($numero);
    $posicion = 0;

    for ($i=0; $i < digito($numero) ; $i++) { 
        if (digitoN($numero, $i)==$digito) {
            $posicion = $i;
            return $posicion;
        }
    }

    if ($posicion == 0) {
        return -1;
    }
    
}

//quitaPorDetras: Le quita a un número n dígitos por detrás (por la derecha).

function quitaPorDetras($numero, $n) {
    $nuevo = (int)($numero / pow(10, $n));
    return $nuevo;
}

//quitaPorDelante: Le quita a un número n dígitos por delante (por la izquierda).
function quitaPorDelante($numero, $n){
    $nuevo = voltea($numero);
    $nuevoRec = quitaPorDetras($nuevo,$n);

    return voltea($nuevoRec);
}

//pegaPorDetras: Añade un dígito a un número por detrás.

function pegaPorDetras($numero,$digito){
    return $numero*10+$digito;
}

// pegaPorDelante: Añade un dígito a un número por delante.

function pegaPorDelante($numero, $digito){
    $lon = digito($numero);
    $res = $digito * pow(10,$lon) + $numero;
    return $res;
}

// trozoDeNumero: Toma como parámetros las posiciones inicial y final dentro de un número y devuelve el trozo correspondiente. 

function trozoDeNumero($numero, $inicio, $fin){
    $numero = quitaPorDetras($numero,$fin-$inicio);
    $numero = quitaPorDelante($numero,$inicio);

    return $numero;
}

// juntaNumeros: Pega dos números para formar uno.

function juntaNumeros ($n1,$n2){
    $res = $n1 * pow(10,digito($n2)) + $n2;
    return $res;
}