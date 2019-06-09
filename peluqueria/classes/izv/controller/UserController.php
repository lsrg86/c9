<?php

namespace izv\controller;

use izv\app\App;
use izv\data\Ciente;
use izv\model\Model;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;
use izv\tools\Mail;

class UserController extends Controller {

    function __construct(Model $model) {
        parent::__construct($model);
        $this->getModel()->set('title', 'User Controller');
        $this->getModel()->set('twigFile', '_base.html');
    }
    
    
    
    function login() {
        $this->getModel()->set('twigFile', '_login.html');
    }

    function logged(){
        
        $id=$this->getSession()->getLogin()->getId();
        // echo Util::varDump($id);
        // exit();
        $usuario=$this->getModel()->getUsuario($id);
        // echo Util::varDump($usuario);
        // exit();
        $this->getModel()->set('datos', $usuario);
        $permiso=$usuario->getPermisos();
        // if($permiso===1){
        //      header('Location: ' . App::BASE . 'admin/main');
        // }else{
        $this->getModel()->set('twigFile', '_logged.html');
        // }
        
    }
    
    function listar(){
        $resultado = $this->getModel()->getUsuarios();
        // var_dump($resultado);
        // exit();
        $this->getModel()->set('datos', $resultado);
        
        $this->getModel()->set('twigFile','_logged.html');
        
    } 

    function main() {
        $this->getModel()->set('twigFile', '_main.html');
    }
    
    function doLogin(){
        
        $correoUsuario = Reader::read('correo');
        $claveUusario = Reader::read('clave');
        
        $c='izv\data\Cliente';
        
        $usuario = $this->getModel()->getEntityManager()->getRepository($c)->findOneBy([
                'correo' => $correoUsuario
            ]);
            
        if (!empty($usuario)) {
            $resultado = Util::verificarClave($claveUusario, $usuario->getClave()); 
            $activo = $usuario->getActivo();
           $id= $usuario->getId();
            if($resultado && $activo===1){
               $this->getSession()->login($usuario);
               $admin = $this->isAdmin();
               if($admin){
                        header('Location: paginador?op=login&res=1');
                   exit();
                   }else{
                   header('Location: logged?op=login&res=1');
                   exit();
                   }
            } 
        }
        header('Location: user/main?op=login&res=0');
    }

    function doBorrar(){
        $id = Reader::read('id');
        // var_dump($id);
        // exit();
        $resultado = $this->getModel()->borrar($id);
        header('Location: listar?op=borrado&res=1');
    }

    function register() {
            $r = Reader::read('r');
            
            if($r!==null){
                $this->getModel()->set('respuesta', $r);
            }
            $this->getModel()->set('twigFile', '_register.html');
        
    }
    
    function doRegister(){
        $usuario = Reader::readObject('izv\data\Cliente');  
   
      
          $usuario->setClave(Util::encriptar($usuario->getClave()));
          $r = $this->getModel()->addUser($usuario);

          if($r != 0 && $r != -1){
              
                $r = Mail::sendActivation($usuario);
                
                header('Location: ' . App::BASE . 'user/register?r=' . $r ? '1' : '0' );
          }
       
      header('Location: ' . App::BASE . 'user/register?resultado=' . $r );
    }
    
    function doActivar(){
        $id = Reader::read('id');
        $c ='izv\data\Cliente';
        $usuario = $this->getModel()->getEntityManager()->getRepository($c)->findOneBy([
                'id' => $id]);
        $usuario->setActivo('1');
        
            $this->getModel()->getEntityManager()->flush();
            header('Location: ' . App::BASE . 'user/login');
        
    }
    
    function paginador() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $resultado = $this->getModel()->getUsuariosPaginados($pagina);
        //$this->getModel()->set('aulas', $aulas);
        $this->getModel()->add($resultado);
        
        $this->getModel()->set('twigFile', '_logged.html');
    }
    private function isAdmin() {
        return $this->getSession()->isLogged() && $this->getSession()->getLogin()->getPermisos() === 1;
    }
    
    function editar(){
        $id = Reader::read('id');
        $resultado = $this->getModel()->getUsuario($id);
        if($resultado != null){
                                    
            $this->getModel()->set('datos', $resultado);
        }
        
        $this->getModel()->set('twigFile', '_edit.html');
        
    }
    
    function doEditar(){
        $usuario = Reader::readObject('izv\data\Cliente');
        
        $resultado = $this->getModel()->editar($usuario);
        
        $admin = $this->isAdmin();
        if($admin){
                        header('Location: listar?op=login&res=1');
                   exit();
                   }else{
                        header('Location: logged?op=login&res=1');
                   exit();
                   }
        
    }
    
    
}
    
    
   

