<?php



require('SubirArchivos.php');
$archivo = new SubirArchivos('archivos');
$r = $archivo->upload();
echo '<pre>' . var_export($r, true) . '</pre>';
