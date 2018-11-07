<?php



class MultiUpload {

    const KEEP = 1,
            OVERWRITE = 2,
            RENAME = 3;
            
    private $error=0,$input, $name = null, $policy = self::OVERWRITE, $size = 0, $target = './',$type = null;
    
    function __construct($input){
    
        if(isset($_FILES[$input]) && $_FILES[$input]['name'][0]!=='' ){
           $this->input = $_FILES[$input];
           $this->name = $this->input['name'];
        }else{
            $this->error = 1004; 
        }   
    }
    
    
    
     function __doUpload($indice){
        $result = false;
        switch ($this->policy){
            case self::KEEP:
                if(file_exists($this->target.$this->name)=== false){
                    $result=  move_uploaded_file($this->input['tmp_name'][$indice], $this->target.$this->name);
                }
                break;
                
            case self::OVERWRITE:
               
                    $result = move_uploaded_file($this->input['tmp_name'][$indice], $this->target.$this->name);
                
                break;
                
            case self::RENAME:
                break;
                
        }
        return $result;
    }
    
    
    
    
    
    function setName($name) {
       
        $this->name = $name;
        return $this;
    }

    function setPolicy($policy) {
        $this->policy = $policy;
        return $this;
    }

    function setSize($size) {
         $this->size = $size;
         return $this;
    }

    function setTarget($target) {
        $this->target = $target;
        return $this;
    }
    
    function setType($type){
        $this->type =$type;
        return $this;
    }
    
   
    
    function validType($indice){
        $result = true;
        if($this->type!==null){
            $tipo = shell_exec('file --mime ' . $this->input['tmp_name'][$indice]);
            $posicion = strpos($tipo, $this->type);
            if($posicion === false){
                $result = false;
            }
        }
        
        return $result;
    }
    
    function validSize($indice){
        $result = false;
        if($this->size===0 || $this->size >=$this->input['size'][$indice]){
            $result = true;
        }
        
        return $result;
    }
    
    function upload(){
        $result=false;
        if($this->error===0){
            foreach($this->name as $indice =>$valor){
                if($this->input['error'][$indice]===0 && $this->validSize($indice) && $this->validType($indice)){
                    $result = $this->__doUpload($indice); 
                }else{
                     $this->error = 1005; 
                }
            }
        }
        return $result;
    }
    
}

