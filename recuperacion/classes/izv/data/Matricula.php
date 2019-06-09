<?php
// equivale al reader
namespace izv\data;
require_once('../classes/izv/comun/MetodosComunes.php');
require_once('../classes/izv/util/Parametros.php');
use izv\util\Parametros;
class Matricula{
     use \izv\comun\MetodosComunes;
    private $id = 0,$nombre,$apellido,$dni,$fecha,$direccion,$sexo,$asignatura;
    
    function __construct($nombre = null,$apellido = null,$dni = null,$fecha = null,$direccion = null,$sexo = null,$asignatura = null){
        $this->nombre = $nombre;
        
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->fecha = $fecha;
        $this->direccion = $direccion;
        $this->sexo = $sexo;
        $this->asignatura = $asignatura;
    }
    
    
    function getNombre($nombre){
        return $this->nombre;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }
    function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    
    
    
    
    
    /*
    $m = new Matricula();
    en los seters  se meten un return this para que devuelva el propio objeto y  poder concatenar asi:
    $m->setNombre('Pepe')->setApellidos('Lopez Perez');
    */
}