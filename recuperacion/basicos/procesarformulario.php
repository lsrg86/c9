<?php
// $nombre=$_POST['nombre'];
// echo $nombre;
require_once('../classes/izv/util/Parametros.php');
require_once('../classes/izv/data/Matricula.php');

use izv\util\Parametros;
use izv\data\Matricula;
// if(isset($_POST['nombre'])) {
//     $nombre = $_POST['nombre'];
//     echo 'el nombre es: ' . $nombre;
// }

// $nombre = Parametros::leerPost('nombre');

//version a:
// $matricula = new Matricula();
// $matricula-> leer();

//version elegida pero probar todas b

// $matricula = Matricula::leer();
// var_dump($matricula);
//version c:
// $matricula = new Matricula();
// Parametros::leer($matricula);

//vrsion d:
// $matricula = Parametros::leerObjeto(new Matricula());
$matricula = Parametros::leerClase('izv\data\Matricula');
echo $matricula;
// $matricula = Parametros::leerObjeto('izv\data\Matricula');
//$matricula = Parametros::leerString('izv\data\Matricula');