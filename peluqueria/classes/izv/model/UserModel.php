<?php

namespace izv\model;

use izv\data\Cliente;
use izv\tools\Util;
use izv\common\Comun;
use Doctrine\ORM\Tools\Pagination\Paginator;
use izv\tools\Pagination;


class UserModel extends Model {
    
     function addUser ( $usuario){
    
        $result = 1;
        try {
            $this->getEntityManager()->persist($usuario);
            $this->getEntityManager()->flush();
               
        } catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            $result = -1;
        } catch(\Exception $e){
            $result = 0;
        }
        return $result;
    }
    
    function activar ($usuario){
        $result = 1;
        try {
            $usuario->setActivo('1');
            $this->getEntityManager()->flush();
               
        } catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            $result = -1;
        } catch(\Exception $e){
            $result = 0;
        }
        return $result;
    }
    
    function getUsuario($id){
        $cliente = $this->getEntityManager()->getRepository('\izv\data\Cliente')->findOneBy(['id' => $id]);
        return $cliente;
    }
    
    function getUsuarios(){
        $usuarios = array();
        $dql = 'select cli from izv\data\Cliente cli order by cli.alias';
        $query = $this->getEntityManager()->createQuery($dql);
        $result = $query->getResult();
        
        foreach($result as $usuario) {
            $usuarios[] = $usuario->getUnset(array('pedidos'));
        }
        return $usuarios;
        
    } 
    
    function borrar($id){
        $usuario = $this->getUsuario($id);
        $this->getEntityManager()->remove($usuario);
        $this->getEntityManager()->flush();
    }
    
    function editar($usuario){
        
        $usuario_bd = $this->getUsuario($usuario->getId());
        $usuario_bd->setNombre($usuario->getNombre());
        $usuario_bd->setApellidos($usuario->getApellidos());
        $usuario_bd->setAlias($usuario->getAlias());
        $usuario_bd->setCorreo($usuario->getCorreo());
        $usuario_bd->setClave(Util::encriptar($usuario->getClave()));
        $this->getEntityManager()->persist($usuario_bd);
        $this->getEntityManager()->flush();
        return $usuario;
    }
    
    function getUsuariosPaginados($pagina = 1, $rpp = 2) {
        $gestor = $this->getEntityManager();
        $dql = 'select c from izv\data\Cliente c';
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