<?php
// bootstrap.php
require_once "doctrine/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//$paths = array("/path/to/entity-files");
$isDevMode = false;

$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'basedatos',
    'user'     => 'usuario',
    'password' => 'clave'
);

//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src'), $isDevMode);
$entityManager = EntityManager::create($conn, $config);