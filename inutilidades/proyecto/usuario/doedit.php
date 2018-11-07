<?php

require '../classes/autoload.php';

use izv\data\Usuario;
use izv\database\Database;
use izv\managedata\ManageUsuario;
use izv\tools\Reader;
use izv\tools\Util;

$db = new Database();
$manager = new ManageUsuario($db);
$usuario = Reader::readObject('izv\data\Usuario');
$resultado = $manager->edit($usuario);
$db->close();
$url = Util::url() . 'index.php?op=editusuario&resultado=' . $resultado;
echo $url;
header('Location: ' . $url);