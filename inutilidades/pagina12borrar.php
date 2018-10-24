<?php

require 'classes/Autoload.php';
//1º: comprobar si puedo hacerlo
$id = Reader::read('id');
//2º: validar el id: que ha llegado (!null) y que es numérico
$sql = 'delete from producto where id = :id';
$db = new Database();
$resultado = 0;
if($db->connect()) {
    $conexion = $db->getConnection();
    $sentencia = $conexion->prepare($sql);
    $sentencia->bindValue('id', $id);
    if($sentencia->execute()) {
        $resultado = $conexion->lastInsertId();
    } else {
        echo Util::varDump($sentencia->errorInfo());
    }
}
$url = 'pagina12.php?op=insertproducto&resultado=' . $resultado;
//header('Location: ' . $url);
//?>
<a href="<?= $url ?>">seguir</a>