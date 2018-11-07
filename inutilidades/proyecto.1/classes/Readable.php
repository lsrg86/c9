<?php

interface Readable {//es como una contrato,al definirla se definen unos metodos que cuando alguien implementa esa interfaz, eso te obliga a implementar esos metodos
   /**
 * Interfaz Readable
 *
 * @version 1.01
 * @author izv
 * @license http:// la del mit
 * @copyright izv by dwes
 * Interfaz para la transformación de objetos en arrays y viceversa.
 */

    
    /**
    * Obtiene el array asociativo que es 'copia' de un objeto.
    * @access public
    * @return Devuelve un array asociativo cuyos índices son los atributos y los
    * valores son los valores de los atributos.
    */
    function get();
    
    /**
    * Reconstruye un objeto a partir de un array asociativo
    * @access public
    * @param array $array Array asociativo que contiene la 'estructura'
    * del objeto.
    * @return Devuelve la instancia del objeto reconstruido.
    */
    function set(array $array);
}
//se crean objetos especiales, ya que se puede poner un parametro que sea una interfaz, haciando que valgan todos los objetos que implementen la interfaz