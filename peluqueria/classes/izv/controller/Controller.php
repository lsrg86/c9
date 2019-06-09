<?php

namespace izv\controller;

use izv\app\App;
use izv\model\Model;
use izv\tools\Session;
use izv\tools\Reader;
class Controller {

    private $model;
    private $sesion;

    function __construct(Model $model) {
        $this->model = $model;
        
        $this->sesion = new Session(App::SESSION_NAME);
        $this->getModel()->set('logeado',$this->getSession()->isLogged());
        $this->getModel()->set('admin', $this->isAdmin());
        // $paginas = $this->paginador();
        
        // $this->getModel()->add($paginas);
        $this->getModel()->set('urlbase', App::BASE);
    }
    
    function getModel() {
        return $this->model;
    }
    
    function getSession() {
        return $this->sesion;
    }
    function paginador() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $resultado = $this->getModel()->getProductosPaginados($pagina);
        // var_dump($resultado);
        // exit();
        return $resultado;
        
    }
    private function isAdmin() {
        return $this->getSession()->isLogged() && $this->getSession()->getLogin()->getPermisos() === 1;
    }
    /* acciones */
    
    function main() {
        $this->getModel()->set('datos', 'datos que envía el método main');
    }

}