<?php
session_start();
require_once '../classes/vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('CorreoWeb');
$cliente->setClientId('198598046476-qb1ub7bjpi8u08p5vt4ec9b2ppm26nvv.apps.googleusercontent.com');
$cliente->setClientSecret('h7328DnUQlbj-2C9o34WaGQK');
$cliente->setRedirectUri('https://dwese-lsantiago.c9users.io/inutilidades/proyectomvc/gmail/obtenercredenciales.php');

$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline');
if (isset($_GET['code'])) {
    $cliente->authenticate($_GET['code']);
    $_SESSION['token'] = $cliente->getAccessToken();
    $archivo = "token.conf";
    $fh = fopen($archivo, 'w') or die("error");
    fwrite($fh, json_encode($cliente->getAccessToken()));
    fclose($fh);
    header("Location: finalizartoken.php?code=" . $_GET['code']);
}