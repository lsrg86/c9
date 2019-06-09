<?php

require('../classes/autoload.php');
require('../classes/vendor/autoload.php');

$bs = new izv\tools\Bootstrap();
$gestor = $bs->getEntityManager();

//$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

$dql = 'select p, d from izv\data\Pedido p join p.detalles d';
$dql = 'select p from izv\data\Pedido p';

$query = $gestor->createQuery($dql);
$resultados = $query->getResult();

foreach ($resultados as $resultado) {
    echo $resultado->getId() . '<br>';
    $detalles = $resultado->getDetalles();
    foreach($detalles as $detalle) {
        echo $detalle->getPrecio() . '<br>';
    }
}