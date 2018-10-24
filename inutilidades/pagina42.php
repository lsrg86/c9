<?php

/*if(isset($_GET['nombre'])) {
    echo $_GET['nombre'];
}
echo '<br>';
if(isset($_POST['nombre'])) {
    echo $_POST['nombre'];
}*/

require('classes/Reader.php');//usar este

/*
require 'classes/Reader.php';//no usar
require_once 'classes/Reader.php';//no usar
require_once('classes/Reader.php');//no usar
include 'classes/Reader.php';//da error pero sigue ejecutandose*/

echo Reader::read('nombre');