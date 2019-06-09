<?php

namespace izv\model;

use izv\data\Producto;
use izv\tools\Util;
use izv\common\Comun;
use Doctrine\ORM\Tools\Pagination\Paginator;
use izv\tools\Pagination;


class PedidoModel extends Model {
    
    
    
    function getProductosPaginados($pagina = 1, $rpp = 4) {
        $gestor = $this->getEntityManager();
        $dql = 'select c from izv\data\Producto c';
        $query = $gestor->createQuery($dql);
        $paginator = new Paginator($query); //dql
        $total = $paginator->count();
        $pagination = new Pagination($total, $pagina, $rpp); //mio
        $paginator->getQuery()
            ->setFirstResult($pagination->offset())
            ->setMaxResults($pagination->rpp());
        return array('datos' => $paginator, 'paginas' => $pagination->values());
    
    }
    
}