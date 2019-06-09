<?php

require_once('SubirArchivos.php');

$archivo = new SubirArchivos('archivos');

$result = $archivo->upload();
$tama = $archivo->tamanoValido();
$file=$archivo->getFile();
echo '<br><br><br><hr><br>';
echo 'ARCHIVO: ' ;
echo '<pre>' . var_export($archivo, true) . '</pre>';
echo 'RESULTADO: ';
echo '<pre>' . var_export($result, true) . '</pre>';
echo 'TAMAÑO: ';
echo '<pre>' . var_export($tama, true) . '</pre>';
echo 'FILE: ' ;
echo '<pre>' . var_export($file, true) . '</pre>';
