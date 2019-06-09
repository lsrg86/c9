<?php

require_once '../vendor/autoload.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array('./src');
$isDevMode = true;

//Indicamos el nombre de la base de datos, usuario, contrasaña... 
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'peluqueria',
    'password' => 'peluqueria',
    'dbname'   => 'peluqueria'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create ($dbParams, $config); //gestor