<?php

namespace izv\controller;

use izv\app\App;
use izv\data\Producto;
use izv\model\Model;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;
use izv\tools\Mail;

class PedidoController extends Controller {

    function __construct(Model $model) {
        parent::__construct($model);
        $this->getModel()->set('title', 'Pedido Controller');
        $this->getModel()->set('admin', $this->isAdmin());
        $this->getModel()->set('twigFile', '_base.html');
    }
    
    private function isAdmin() {
        return $this->getSession()->isLogged() && $this->getSession()->getLogin()->getPermisos() === 1;
    }
    
    

    function main() {
        $this->getModel()->set('twigFile', '_main.html');
    }
    
    
    function paginador() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $resultado = $this->getModel()->getProductosPaginados($pagina);
        //$this->getModel()->set('aulas', $aulas);
        // var_dump($resultado);
        // exit();
        $this->getModel()->add($resultado);
        // var_dump($resultado);
        // exit();
        $this->getModel()->set('twigFile', '_tienda.html');
    }
    
}