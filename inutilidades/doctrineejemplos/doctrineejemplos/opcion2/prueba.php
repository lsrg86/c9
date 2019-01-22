<?php

/*
create database basedatos2 default character set utf8 collate utf8_unicode_ci;
grant all on basedatos2.* to usuario@localhost;
flush privileges;
*/

require_once 'bootstrap.php';
require_once 'src/Alumno.php';
require_once 'src/AlumnoMateria.php';
require_once 'src/Materia.php';

/*$alumno = new Alumno();
$alumno->setNombre('paco');
$entityManager->persist($alumno);
$entityManager->flush();
echo 'Alumno: ' . $alumno->getId() . "<hr>";

$materia = new Materia();
$materia->setMateria('otra');
$entityManager->persist($materia);
$entityManager->flush();
echo 'Materia: ' . $materia->getId() . "<hr>";

$alma = new AlumnoMateria();
$alma->setAlumno($alumno);
$alma->setMateria($materia);
$entityManager->persist($alma);
$entityManager->flush();
echo 'Alumno materia: ' . $alma->getId() . "<hr>";*/

$alumno = new Alumno();
$alumno->setNombre('al6');
$entityManager->persist($alumno);
$entityManager->flush();
echo 'Alumno: ' . $alumno->getId() . "<hr>";

$materia = new Materia();
$materia->setMateria('ma6');
$entityManager->persist($materia);
$entityManager->flush();
echo 'Materia: ' . $materia->getId() . "<hr>";

$alumno->addMateria($materia);
$entityManager->persist($alumno);
$entityManager->flush();