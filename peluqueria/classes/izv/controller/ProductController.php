<?php

namespace izv\controller;

use izv\app\App;
use izv\data\Producto;
use izv\model\Model;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;
use izv\tools\Mail;

class ProductController extends Controller {

    function __construct(Model $model) {
        parent::__construct($model);
        $this->getModel()->set('title', 'Product Controller');
        $this->getModel()->set('admin', $this->isAdmin());
        $this->getModel()->set('twigFile', '_base.html');
    }
    
    private function isAdmin() {
        return $this->getSession()->isLogged() && $this->getSession()->getLogin()->getPermisos() === 1;
    }
    
    

    function main() {
        $this->getModel()->set('twigFile', '_main.html');
    }
    
    

    function doBorrar(){
        $id = Reader::read('id');
        // var_dump($id);
        // exit();
        $resultado = $this->getModel()->borrar($id);
        header('Location: paginador?op=borrado&res=1');
    }

    function registerProduc() {
            $r = Reader::read('r');
            
            if($r!==null){
                $this->getModel()->set('respuesta', $r);
            }
            $this->getModel()->set('twigFile', '_regisproduc.html');
        
    }
    
    function doRegisterProduc(){
        $producto = Reader::readObject('izv\data\Producto');  
   
    //   var_dump($producto);
    //     exit();
          
          $r = $this->getModel()->addProduct($producto);
            
          if($r != 0 && $r != -1){
              
                // $r = Mail::sendActivation($producto);
                
                header('Location: ' . App::BASE . 'producto/registerProduc?r=' . $r ? '1' : '0' );
          }
       
      header('Location: ' . App::BASE . 'producto/registerProduc?resultado=' . $r );
    }
    
    
    
    function paginador() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $resultado = $this->getModel()->getProductosPaginados($pagina);
        //$this->getModel()->set('aulas', $aulas);
        $this->getModel()->add($resultado);
        
        $this->getModel()->set('twigFile', '_productos.html');
    }
    
    function editar(){
        $id = Reader::read('id');
        $resultado = $this->getModel()->getProducto($id);
        if($resultado != null){
                                    
            $this->getModel()->set('datos', $resultado);
        }
        
        $this->getModel()->set('twigFile', '_editproduc.html');
        
    }
    
    function doEditar(){
        $producto = Reader::readObject('izv\data\Producto');
        
        $resultado = $this->getModel()->editar($producto);
        
        $admin = $this->isAdmin();
        if($admin){
                        header('Location: paginador?op=login&res=1');
                   exit();
                   }else{
                        header('Location: logged?op=login&res=1');
                   exit();
                   }
        
    }
    
    
    function comprar(){
        $id = Reader::read('id');
        $resultado = $this->getModel()->getProducto($id);
        if($resultado != null){
            $this->getModel()->set('datos', $resultado);
        }
        
        $this->getModel()->set('twigFile', '_pedido.html');
    }
    
    
}