<?php
// equivale al reader
namespace izv\util;
class Parametros{
    
    
    static function leer(string $nombre) {
        $valor = self::leerGet($nombre);
        if($valor === null) {
            $valor = self::leerPost($nombre);
        }
        return $valor;
    }
    
    static function leerGet(string $nombre) {
        return self::_leer($nombre, $_GET);
    }

    static function leerPost(string $nombre) {
        return self::_leer($nombre, $_POST);
    }
    
    static private function _leer(string $nombre, array $array){
        $valor=null;
        if(isset($array[$nombre])) {
            $valor = trim($array[$nombre]);
   
        }
        return $valor;
    }
    
    static function leerObjeto($objeto, string $funcionGet='getAtributos', string $funcionSet='setAtributos'){
         if(method_exists($objeto, $funcionGet) && method_exists($objeto, $funcionSet)) {
        $atributos = $objeto->$funcionGet();
        foreach($atributos as $indice => $valor) {
            $atributos[$indice] = self::leer($indice);
        }
        $objeto->$funcionSet($atributos);
        return $objeto;
         }
        return null;
    }
    static function leerClase(string $nombreClase, string $funcionGet='getAtributos', string $funcionSet='setAtributos'){
        $objeto = new $nombreClase();
        return self::leerObjeto(new $nombreClase(),$funcionGet, $funcionSet);
    }
    
    
    
    //Esto se usaría así sin static:
    // $parametros = new Parametros();
    // $valor=$parametros->leerPost('nombre');
    //Con static:
    // $valor = Parametros::leerPost('nombre');
}