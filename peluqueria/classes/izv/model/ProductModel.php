<?php

namespace izv\model;

use izv\data\Producto;
use izv\tools\Util;
use izv\common\Comun;
use Doctrine\ORM\Tools\Pagination\Paginator;
use izv\tools\Pagination;


class ProductModel extends Model {
    
     function addProduct ( $producto){
    
        $result = 1;
        try {
            $this->getEntityManager()->persist($producto);
            $this->getEntityManager()->flush();
               
        } catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            $result = -1;
        } catch(\Exception $e){
            $result = 0;
        }
        return $result;
    }
    
    // function activar ($producto){
    //     $result = 1;
    //     try {
    //         $producto->setActivo('1');
    //         $this->getEntityManager()->flush();
               
    //     } catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
    //         $result = -1;
    //     } catch(\Exception $e){
    //         $result = 0;
    //     }
    //     return $result;
    // }
    
    function getProducto($id){
        $producto = $this->getEntityManager()->getRepository('\izv\data\Producto')->findOneBy(['id' => $id]);
        return $producto;
    }
    
    function getProductos(){
        $productos = array();
        $dql = 'select pro from izv\data\Producto pro order by pro.nombre';
        $query = $this->getEntityManager()->createQuery($dql);
        $result = $query->getResult();
        
        foreach($result as $producto) {
            $productos[] = $producto->getUnset(array('detalles'));
        }
        return $productos;
        
    } 
    
    function borrar($id){
        $producto = $this->getProducto($id);
        $this->getEntityManager()->remove($producto);
        $this->getEntityManager()->flush();
    }
    
    function editar($producto){
        
        $producto_bd = $this->getProducto($producto->getId());
        $producto_bd->setNombre($producto->getNombre());
        $producto_bd->setPrecio($producto->getPrecio());
        $producto_bd->setTipo($producto->getTipo());
        $producto_bd->setVolumendesde($producto->getVolumendesde());
        $producto_bd->setVolumenhasta($producto->getVolumenhasta());
        $producto_bd->setDescripcion($producto->getDescripcion());
        $this->getEntityManager()->persist($producto_bd);
        $this->getEntityManager()->flush();
        return $producto;
    }
    
    function getProductosPaginados($pagina = 1, $rpp = 2) {
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