<?php

namespace izv\model;

use izv\data\City;
use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageCity;
use izv\managedata\ManageUsuario;
use izv\tools\Pagination;

class UserModel extends Model {

    function login(Usuario $usuario) {
        $manager = new ManageUsuario($this->getDatabase());
        return $manager->login($usuario->getCorreo(), $usuario->getClave());
    }

    function register(Usuario $usuario) {
        $manager = new ManageUsuario($this->getDatabase());
        $r = $manager->add($usuario);
        if($r > 0) {
            $usuario->setId($r);
        }
        return $r;
    }
    
    function getAll() {
        $manager = new ManageUsuario($this->db);
        return $manager->getAll();
    }
    
}