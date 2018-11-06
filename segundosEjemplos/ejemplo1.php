<?php

//require('classes/izvdwes/data/Producto.php');
require('classes/autoload.php');

use izvdwes\data\Alumno;
use izvdwes\data\Producto;
use izvdwes\tools\Tools;
//$producto = new izvdwes\data\Producto();
//$producto = new Producto();

//echo '<pre>' . var_export($producto, true) . '</pre>';

$alumno = new Alumno();

$arrayAlu = array('López Pérez',
                '12345678H',
                '2001-12-22',
                'María',
                1,
                'f',
                '676112233');

$alumno->get($arrayAlu);

Tools::print($alumno);
