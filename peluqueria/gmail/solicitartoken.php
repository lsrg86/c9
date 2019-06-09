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
if (!$cliente->getAccessToken()) {
    $auth = $cliente->createAuthUrl();
    header("Location: $auth");
}