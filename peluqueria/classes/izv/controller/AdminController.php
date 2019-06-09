<?php

namespace izv\controller;

use izv\app\App;
use izv\data\Ciente;
use izv\model\Model;
use izv\tools\Reader;
use izv\tools\Session;
use izv\tools\Util;
use izv\tools\Mail;

class AdminController extends Controller {

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
        $this->getModel()->set('twigFile', '_logged.html');
        
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
               
               header('Location: logged?op=login&res=1');
               
               exit();
            } 
        }
        header('Location: user/main?op=login&res=0');
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
    
    
}