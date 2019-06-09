 <?php

class SubirArchivos {

    const   Mantiene = 1,
            Reescribe = 2,
            Renombra = 3;
            
    private $error=0,$input, $nombre, $accion = self::Mantiene, $maximo, $minimo, $destino = './',$tipoPermitido;
    
    function __construct($input) {
        echo '<pre>' . var_export($_FILES, true) . '</pre>';
        $this->input=$_FILES[$input];
         if($this->input['nombre']!==''){
            $this->nombre= $this->input['nombre'];
         }
        if($this->input['tamano']>0){
            $this->tamano= $this->input['tamano'];
        }
        
    }
    
    function setDestino($destino){
        $this->destino=$destino;
        return $this;
    }
    
    function setNombre($nombre){
        $this->nombre=$nombre;
        return $this;
    }
    
    function setAccion($accion){
        $this->accion=$accion;
        return $this;
    }
    
    function setMaximo($maximo){
        $this->maximo=$maximo;
        return $this;
    }
    
    function setMinimo($minimo){
        $this->minimo=$minimo;
        return $this;
    }
    
    function setTipoPermitido($tipoPermitido){
        $this->tipoPermitido=$tipoPermitido;
        return $this;
    }
    
    

    function getError() {
      $error = $this->error;
    }
    
    
    

    
    
    function __doUpload(){
        $r = false;
        switch ($this->accion){
            case self::KEEP:
                if(file_exists($this->target.$this->name)=== false){
                    $r=  move_uploaded_file($this->input['tmp_name'], $this->target.$this->name);
                }
                break;
                
            case self::OVERWRITE:
                
                    $r = move_uploaded_file($this->input['tmp_name'], $this->target.$this->name);
                
                break;
                
            case self::RENAME:
                break;
                
                
                
        }
    }
function upload(){
    $r = false;
    $r= $this->__doUpload();
    
    
        
}

}
