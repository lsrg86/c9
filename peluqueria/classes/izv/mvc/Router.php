<?php

namespace izv\mvc;

class Router {

    private $rutas, $ruta;
    
    function __construct($ruta) {
        $this->rutas = array(
            'admin' => new Route('AdminModel', 'AdminView', 'AdminController'),
            'producto' => new Route('ProductModel', 'PeluqueriaView', 'ProductController'),
            'pedido' => new Route('PedidoModel', 'PeluqueriaView', 'PedidoController'),
            'user' => new Route('UserModel', 'PeluqueriaView', 'UserController')
        );
        $this->ruta = $ruta;
    }

    function getRoute() {
        $ruta = $this->rutas['user'];
        if(isset($this->rutas[$this->ruta])) {
            $ruta = $this->rutas[$this->ruta];
        }
        return $ruta;
    }
}