<?php

namespace izv\mvc;

class Router {

    private $rutas, $ruta;
    
    function __construct($ruta) {
        $this->rutas = array(
            // 'index' => new Route('FirstModel', 'FirstView', 'FirstController'),
            // 'otro' => new Route('FirstModel', 'ThirdView', 'FirstController'),
            'mate' => new Route('UserModel', 'MateView', 'UserController')
        );
        $this->ruta = $ruta;
    }

    function getRoute() {
        $ruta = $this->rutas['mate'];
        if(isset($this->rutas[$this->ruta])) {
            $ruta = $this->rutas[$this->ruta];
        }
        return $ruta;
    }
}