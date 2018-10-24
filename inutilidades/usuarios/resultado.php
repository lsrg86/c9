<?php
require '../classes/Autoload.php';
$respuesta = Reader::get('res');
if($respuesta!==null){
    if($respuesta == true){
        echo 'Se ha realizado correctamente';
    }else{
        echo 'No se ha podido realizar';
    }
}