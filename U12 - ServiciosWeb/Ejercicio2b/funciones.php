<?php
function traducirTexto($texto, $origen = "en", $destino = "es") {
    if (strlen($texto)<500) {
    
        $texto = urlencode($texto);

        $url = "https://api.mymemory.translated.net/get?q=$texto&langpair=$origen|$destino";

        $response = file_get_contents($url);
        
        if ($response === FALSE) {
            die("Error en la solicitud");
        }

        $json = json_decode($response, true);
        
        return $json["responseData"]["translatedText"] ?? "Error en la traducción";
    }else {

        return $texto;
    }
}

// function traducirTexto($texto, $origen = "en", $destino = "es") {
//     if (strlen($texto) < 500) {
//         return traducirParteTexto($texto, $origen, $destino);
//     } else {
//         $mitad = ceil(strlen($texto) / 2);
//         $parte1 = substr($texto, 0, $mitad);
//         $parte2 = substr($texto, $mitad);
        
//         return traducirParteTexto($parte1, $origen, $destino) . ' ' . traducirParteTexto($parte2, $origen, $destino);
//     }
// }

// function traducirParteTexto($texto, $origen, $destino) {
//     $texto = urlencode($texto);
//     $url = "https://api.mymemory.translated.net/get?q=$texto&langpair=$origen|$destino";
    
//     sleep(0.5);
//     $response = file_get_contents($url);
    
//     if ($response === FALSE) {
//         die("Error en la solicitud");
//     }
    
//     $json = json_decode($response, true);
    
//     return $json["responseData"]["translatedText"] ?? "Error en la traducción";
// }
?>
