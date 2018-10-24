<?php

require 'classes/Autoload.php';
//1º: comprobar si puedo hacerlo
$ids = Reader::readArray('ids');
//2º: validar el id: que ha llegado (!null) y que es numérico entero positivo
$sql = 'delete from producto where id = :id';
$db = new Database();
$resultado = 0;
if($db->connect()) {
    $conexion = $db->getConnection();
    $sentencia = $conexion->prepare($sql);
    foreach($ids as $indice => $valor) {
        $sentencia->bindValue('id', $valor);
        if($sentencia->execute()) {
            $resultado += $sentencia->rowCount();
        }
    }
}
$url = 'pagina12.php?op=deleteproductov2&resultado=' . $resultado;
header('Location: ' . $url);
//? >
//<a href="< ? = $url ? >">seguir</a>