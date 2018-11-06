<?php

namespace izvdwes\tools;

class Session {
    private $name;
    function __construct($name = null) {
        if (session_status() === PHP_SESSION_NONE) {
            if ($name !== null) {
                session_name($name);
            }
            session_start();
        }
    }
    

    function destroy() {
        session_destroy();
    }
    
    
    function get($name) {
        if (isset ( $_SESSION [$name] )) {
            return $_SESSION [$name];
        }
        return null;
    }
    
    function getLogin($name){
        return $_SESSION[$name];
    }

    function set($name, $valor) {
        $_SESSION [$name] = $valor;
    }

    function setLogin($user) {
        session_regenerate_id();
        
    }
    
    function logout(){
        unset ( $_SESSION [$name]);
    }
    
    
}

