<?php
require_once "../doctrine/vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$isDevMode = false;
$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'basedatos2',
    'user'     => 'usuario',
    'password' => 'clave'
);
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src'), $isDevMode);
$entityManager = EntityManager::create($conn, $config);