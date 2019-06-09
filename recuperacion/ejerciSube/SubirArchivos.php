<?php

class SubirArchivos {

    const   
        MANTENER = 1,
        SOBREESCRIBIR = 2,
        RENOMBRAR = 3,
        ERROR = 1000;
            
    //Variables de instancia
    private $error = 0,
            $file,
            $input,
            $tamanoMaximo = 2000000, 
            $tamanoMinimo = 2000, 
            $nombre,
            $nombreGuardado = '',
            $accion = self::RENOMBRAR,
            $destino = 'upload/',
            $typeDenegado = array('php','js'),
            $typePermitido = array('jpg','png','gif','jpeg'),
            $type = '';  
            

    function __construct($input) {
        $this->input = $input;
        if(isset($_FILES[$input]) && $_FILES[$input]['name'] != '') {
            $this->file = $_FILES[$input];
            $this->nombre = $this->file['name'];
            $this->type = $this->file['type'];
        } else {
            $this->error = 1;
        }
    }
    
    private function __doSube() {
        $result = false;
        switch($this->accion) {
            case self::MANTENER:
                $result = $this->__doSubeMantener();
                break;
            case self::SOBREESCRIBIR:
                $result = $this->__doSubeSobreEscribir();
                break;
            case self::RENOMBRAR:
                $result = $this->__doSubeRenombrar();
                break;
        }
        if(!$result && $this->error === 0){
            $this->error = 4;
        }
        return $result;
    }
    
    private function __doSubeMantener() {
        $result = false;
        for($i=0;$i<count($this->file['tmp_name']);$i++){
             if(file_exists($this->destino . $this->nombre[$i]) === false) {
            move_uploaded_file($this->file['tmp_name'][$i], $this->destino . $this->nombre[$i]);
        }else {
            $this->error = 3;
            $result = false;
        }
        }
        $result = true;
        return $result;
    }
    
   
    private function __doSubeSobreEscribir() {
        for($i=0;$i<count($this->file['tmp_name']);$i++){
         move_uploaded_file($this->file['tmp_name'][$i], $this->destino . $this->nombre[$i]);
        }
        $result = true;
        return $result;
    }
    
    private function __doSubeRenombrar() {
        for($i=0;$i<count($this->file['tmp_name']);$i++){
        $newName = $this->destino . $this->nombre[$i];
        
        if(file_exists($newName)) {
            $info = pathinfo($newName);
      
        if(isset($info['extension'])) {
            $type = '.' . $info['extension'];
        }
        $cont = 1;
        
        while(file_exists($info['dirname'] . '/' . $info['filename'] . $cont . $type)) {  
            $cont++;
        }
        $newName =$info['dirname'] . '/' . $info['filename'] . $cont . $type;
        }
        move_uploaded_file($this->file['tmp_name'][$i], $newName);
        }
        $result = true;
        return $result;
        
        
    }
    
    private static function __obtenerRenombre($file) {
    
        
        $info = pathinfo($file);
      
        if(isset($info['extension'])) {
            $type = '.' . $info['extension'];
        }
        $cont = 1;
        
        while(file_exists($info['dirname'] . '/' . $info['filename'] . $cont . $type)) {  
            $cont++;
        }
        
        $this->nombreGuardado = $parts['filename'] . $cont . $type; 
        return $info['dirname'] . '/' . $parts['filename'] . $cont . $type;
    }

    function getError() {
        $error = $this->error + self::ERROR;
        
        
        if($error === self::ERROR) {
            $error = $this->file['error'];
        }
        return $error;
    }
    
    function getNombre() {
        $nombre = $this->nombre;
        // if($nombre !== ''){
        //     $nombre =$this->nombre;
        // }
        return $nombre;
    }
    function getFile(){
        $file = $this->file;
        return $file;
    }
    function getTamanoMaximo() {
        return $this->tamanoMaximo;
    }
    
    function getTamanoMinimo() {
        return $this->tamanoMinimo;
    }
    
    
    function tamanoValido() {
       
       
        $tamanoArchivo = $this->file['size'];
        if ($tamanoArchivo[0] < $this->tamanoMinimo || $tamanoArchivo[0] > $this->tamanoMaximo){
            $this->error =  5; 
            
            echo 'Tamaño de archivo inválido'; 
        }
      return $tamanoArchivo[0];
    }
    
    function tipoValido() {
        $valido = false;
        $info = pathinfo($file);
     
        if($info['extension'] !== '') {
            $type = '.' . $info['extension'];
           
            $strType = strtolower($type);
            
            if (in_array($strType, $typePermitido)) {
                $valido = true;
            }
        return $valido;
        }
    }
    
  function tipoDenegado() {
        $valido = false;
        
        if($this->type !== '') {
            $info = pathinfo($file);
            $type = '.' . $info['extension'];
            
            $strType = strtolower($type);
            
            if (in_array($strType, $typeDenegado)) {
                $valido = true;
            }
        return $valido;
        }
    }
    
    function setNombre($nombre) {
        if(is_string($nombre) && trim($nombre) !== '') {
            $this->nombre = trim($nombre);
        }
        return $this;
    }
    

    function setPolicy($policy) {
        if(is_int($policy) && $policy >= self::ERROR && $policy <= self::RENOMBRAR) {
            $this->policy = $policy;
        }
        return $this;
    }

    
    function setDestino($destino) {
        if(is_string($destino) && trim($destino) !== '') {
            $this->destino = trim($destino);
        }
        return $this;
    }
    
    
    function setType (array $type) {
 
        if(is_string($type) && trim($type) !== '') {
            $this->type = trim($type);
        }
        return $this;
    }

   function upload() {
        $result = false;
        // if($this->error !== 1 && $this->file['error']=== 0) {
        //     if($this->tamanoValido() && $this->tipoValido()) {
        //         $this->error = 0;
        //         // $result = true;
        //         $result = $this->__doSube();
        //     } else {
        //         $this->error = 2;
        //     }
        // }
        $result =$this->__doSube();
        return $result;
    }
}