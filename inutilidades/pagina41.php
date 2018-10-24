<?php

var_dump($_GET);
echo '<hr>';
//echo '<pre>' . var_export($_SERVER, true) . '</pre>';
echo '<pre>' . var_export($_SERVER['QUERY_STRING'], true) . '</pre>';
$partes = explode('&',$url);
echo '<hr>';

if(isset($_GET['fumador'])) {
    echo 'es fumador';
} else {
    echo 'no es fumador';
}

if(isset($_GET['extra'])) {
    $extra = $_GET['extra'];
    if(is_array($extra)){
    foreach($extra as $indice => $valor) {
        echo '<br>el valor de extra en la posición ' . $indice . ' es: ' . $valor;
    }
        
    }
}