<?php

namespace izv\tools;

use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration,
    izv\app\App;
    
class Bootstrap{
    private $entityManager;

    function __construct() {
        $paths = array('./cli_doctrine/src/');
        
        $isDevMode = true;
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => App::USER,
            'password' => App::PASSWORD,
            'dbname'   => App::DATABASE,
            'charset'  => 'utf8'
        );
        
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }
    
    
    function getEntityManager() {
        return $this->entityManager;
    }
}