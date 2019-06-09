<?php
session_start();
require_once '../classes/vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('CorreoWeb');
$cliente->setClientId('684083455961-vgqu8a6decovrfe102ocsksbij0k3i49.apps.googleusercontent.com');
$cliente->setClientSecret('MD9FaQOrCyQlweFb60OqOJyQ');
$cliente->setRedirectUri('https://dwese-lsantiago.c9users.io/peluqueria/gmail/obtenercredenciales.php');

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