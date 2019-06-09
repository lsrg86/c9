<?php

namespace izv\model;

use izv\data\Cliente;
use izv\tools\Util;


class AdminModel extends Model {
    
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
    
    
    
}