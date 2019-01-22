<?php

error_reporting(E_ALL);//para mostrar errores
ini_set('display_errors', 1);

if(!empty($_GET['esteesta'])) {
    echo 'esteesta está<br>';
} else {
    echo 'esteesta no está<br>';
}

