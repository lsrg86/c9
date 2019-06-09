<?php

namespace izv\data;

class Usuario {

    use \izv\common\Comun;

    private $id, $correo, $alias, $nombre ,$apellidos, $clave, $activo, $fechaalta,$permisos;

    function __construct($id = null, $correo = null, $alias = null, $nombre = null, $clave = null, $activo = null, $fechaalta = null,$permisos = null) {
        $this->id = $id;
        $this->correo = $correo;
        $this->alias = $alias;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->activo = $activo;
        $this->fechaalta = $fechaalta;
        $this->permisos = $permisos;
    }

    function getId() {
        return $this->id;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getAlias() {
        return $this->alias;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getClave() {
        return $this->clave;
    }

    function getActivo() {
        return $this->activo;
    }

    function getFechaalta() {
        return $this->fechaalta;
    }
    
    function getPermisos(){
        return $this->permisos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setAlias($alias) {
        $this->alias = $alias;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function setFechaalta($fechaalta) {
        $this->fechaalta = $fechaalta;
    }
    
    function setPermisos($permisos){
        $this->permisos = $permisos;
    }

}