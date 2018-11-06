<?php

echo 'Datos enviados ';



$nombre = 'El campo nombre esta vacío';
$sexo = 'El campo sexo esta vacío';
$contrasen = 'El campo contraseña esta vacío';
$aficiones = 'El campo aficiones esta vacío';
$fecha = 'El campo fecha esta vacío';
$correo = 'El campo correo esta vacío';
$archivo = 'El campo archivo esta vacío';
$transporte = 'El campo transporte esta vacío';
$hermanos = 'El campo hermanos esta vacío';

if(isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
}

if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
}

if(isset($_GET['sexo'])) {
    $sexo = $_GET['sexo'];
}

if(isset($_POST['sexo'])) {
    $sexo = $_POST['sexo'];
}

if(isset($_GET['contrasen'])) {
    $contrasen = $_GET['contrasen'];
}

if(isset($_POST['contrasen'])) {
    $contrasen = $_POST['contrasen'];
}

if(isset($_GET['aficiones'])) {
    $aficiones = $_GET['aficiones'];
}

if(isset($_POST['aficiones'])) {
    $aficiones = $_POST['aficiones'];
}

if(isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
}

if(isset($_POST['fecha'])) {
    $fecha = $_POST['fecha'];
}

if(isset($_GET['correo'])) {
    $correo = $_GET['correo'];
}

if(isset($_POST['correo'])) {
    $correo = $_POST['correo'];
}

if(isset($_GET['archivo'])) {
    $archivo = $_GET['archivo'];
}

if(isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
}

if(isset($_GET['transporte'])) {
    $transporte = $_GET['transporte'];
}

if(isset($_POST['transporte'])) {
    $transporte = $_POST['transporte'];
}

if(isset($_GET['hermanos'])) {
    $hermanos = $_GET['hermanos'];
}

if(isset($_POST['hermanos'])) {
    $hermanos = $_POST['hermanos'];
}

echo '<br>Nombre: ' . $nombre;
echo '<br>Sexo: ' . $sexo; 
echo '<br>Contraseña: ' . $contrasen;
echo '<br>Aficiones: ' . $aficiones;
echo '<br>Fecha: ' . $fecha;
echo '<br>Correo: ' . $correo;
echo '<br>Currículum: ' . $archivo;
echo '<br>Hermanos: ' . $hermanos;
echo '<br>Transporte: ' . $transporte;