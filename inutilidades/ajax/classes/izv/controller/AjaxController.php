<?php

namespace izv\controller;

use izv\app\App;
use izv\data\Usuario;
use izv\model\Model;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;

class AjaxController extends Controller {

    function __construct(Model $model) {
        parent::__construct($model);
        //...
    }
    
    function comprobaralias() {
        sleep(3);
        $alias = Reader::read('alias');
        $available = 0;
        if($alias !== null && $alias !== '') {
            $available = $this->getModel()->aliasAvailable($alias);
        }
        $this->getModel()->set('aliasdisponible', $available);
    }
    
    function comprobarcorreo() {
        sleep(3);
        $correo = Reader::read('correo');
        $available = 0;
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $available = $this->getModel()->correoAvailable($correo);
        }
        $this->getModel()->set('correodisponible', $available);
    }

    function listaciudades() {
        $ordenes = [
            'id' => '',
            'name' => '',
            'countrycode' => '',
            'district' => '',
            'population' => ''
        ];
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        if(!isset($ordenes[$orden])) {
            $orden = 'name';
        }
        $r = $this->getModel()->getDoctrineCiudades($pagina, $orden);
        $this->getModel()->add($r);
    }

    function listavalores() {
        $array = [];
        $array[] = ['codigo' => 1, 'descripcion' => 'hola'];
        $array[] = ['codigo' => 2, 'descripcion' => 'adios'];
        $this->getModel()->set('resultado', $array);
    }
    
    function main() {
    }
    
    //
    function upload() {
        $result = false;
        if($this->getSession()->isLogged()) {
            //funciona, pero hay algún detalle pendiente, para vosotros
            $upload = new Upload('image');
            $upload->setTarget('upload/');
            $upload->setPolicy(Upload::POLICY_KEEP);
            $upload->setName($this->getSession()->getLogin()->getId());
            $result = $upload->upload();
        }
        $this->getModel()->set('upload', $result);
        $this->getModel()->set('file', $upload->getRoute());
    }
    function nada() {
        sleep(3);
    }
}