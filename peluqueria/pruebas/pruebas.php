<?php

require('../classes/autoload.php');
require('../classes/vendor/autoload.php');

$bs = new izv\tools\Bootstrap();
$gestor = $bs->getEntityManager();

$usuario = new izv\data\Cliente();

$usuario->setNombre('pepe');
$usuario->setApellidos('Sierra');
$usuario->setAlias('ps');
$clave = izv\tools\Util::encriptar('1234');
$usuario->setClave($clave);
$usuario->setCorreo('ps@asd.com');
$usuario->setActivo('1');

$gestor->persist($usuario);
$gestor->flush();
exit;
// $producto = new izv\data\Producto();

// $producto->setNombre('Vanilla');
// $producto->setPrecio(2);
// $producto->setTipo('Champu');
// $producto->setVolumendesde(100);
// $producto->setVolumenhasta(250);

// $gestor->persist($producto);
// $gestor->flush();

// $pedido = new izv\data\Pedido();


// $cliente = $gestor->getReference('izv\data\Cliente', 1);
// $pedido->setCliente($cliente);

// $gestor->persist($pedido);
// $gestor->flush();

$detalle = new izv\data\Detalle();


$detalle->setCantidad(2);
$detalle->setPrecio(4);
$pedido = $gestor->getReference('izv\data\Pedido', 1);
$detalle->setPedido($pedido);
$producto = $gestor->getReference('izv\data\Producto', 1);
$detalle->setProducto($producto);

$gestor->persist($detalle);
$gestor->flush();