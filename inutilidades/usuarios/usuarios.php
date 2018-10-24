<?php


require '../classes/Autoload.php';

$val= false;
$usuario = Reader::post('nombre');
$archivo = new Upload('archivo');
$target = '/home/ubuntu/privado/';

$archivo->setTarget($target.$usuario.'/');

    
        if(!file_exists($target.$usuario)){
            mkdir($target.$usuario, 0777);
            $archivo->upload();
           $val=true; 
        }
    
$direc = 'resultado.php?res=' . $val;
header('Location: ' . $direc);