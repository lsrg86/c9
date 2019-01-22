<?php

namespace izv\model;

use izv\database\Database;

class Model {

    protected $db;
    private $datosVista = array();

    function __construct() {
        $this->db = new Database();
    }
    
    function __desctruct() {
        $this->db->close();
    }
    
    function get($name) {
        if(isset($this->datosVista[$name])) {
            return $this->datosVista[$name];
        }
        return null;
    }

    function getDatabase() {
        return $this->db;
    }

    function getViewData() {
        return $this->datosVista;
    }

    function set($name, $value) {
        $this->datosVista[$name] = $value;
        return $this;
    }
}