 <?php

class Upload {

    const   KEEP = 1,
            OVERWRITE = 2,
            RENAME = 3;
            
    private $error=0,$input, $name, $policy = self::OVERWRITE, $size, $target = './',$type;
    
    function __construct($input) {
        echo '<pre>' . var_export($_FILES, true) . '</pre>';
        $this->input=$_FILES[$input];
         if($this->input['name']!==''){
            $this->name= $this->input['name'];
         }
        if($this->input['size']>0){
            $this->size= $this->input['size'];
        }
        
    }
    
    
    
    
    
    
    

    function getError() {
      $error = $this->error;
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
    
    function __doUpload(){
        $r = false;
        switch ($this->policy){
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
