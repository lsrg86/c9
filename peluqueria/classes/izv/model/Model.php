<?php

namespace izv\model;

use izv\tools\Bootstrap;
use izv\tools\Util;
use Doctrine\ORM\Tools\Pagination\Paginator;
use izv\tools\Pagination;
class Model {

    private $datosVista = array();
    // Creamos el manejador de la BD (Doctrine)
    private $entityManager;

    function __construct() {
        // Hacemos la instancia en el constructor xq todos los modelos van a necesitar el manejador
        $bootstrap = new Bootstrap();
        
        $this->entityManager = $bootstrap->getEntityManager();
    }
    
    function add(array $array) {
        foreach($array as $indice => $valor) {
            $this->set($indice, $valor);
        }
    }

    function get($name) {
        if(isset($this->datosVista[$name])) {
            return $this->datosVista[$name];
        }
        return null;
    }

    function getViewData() {
        return $this->datosVista;
    }
    
    function getEntityManager(){
        return $this->entityManager;
    }

    function set($name, $value) {
        $this->datosVista[$name] = $value;
        return $this;
    }
    
    function getProductosPaginados($pagina = 1, $rpp = 4) {
        $gestor = $this->getEntityManager();
        $dql = 'select c from izv\data\Producto c';
        $query = $gestor->createQuery($dql);
        $paginator = new Paginator($query); //dql
        $total = $paginator->count();
        $pagination = new Pagination($total, $pagina, $rpp); 
        $paginator->getQuery()
            ->setFirstResult($pagination->offset())
            ->setMaxResults($pagination->rpp());
        return array('datos' => $paginator, 'paginas' => $pagination->values());
    
    }
}