<?php

/*
create database basedatos1 default character set utf8 collate utf8_unicode_ci;
grant all on basedatos1.* to usuario@localhost;
flush privileges;

create table alumno (
  id int auto_increment primary key,
  nombre varchar(40) not null unique
);
create table materia (
  id int auto_increment primary key,
  materia varchar(40) not null unique
);
create table alumnomateria (
  id int auto_increment primary key,
  idalumno int not null,
  idmateria int not null,
  foreign key (idalumno) references alumno(id),
  foreign key (idmateria) references materia(id)
);
*/

require_once 'bootstrap.php';
require_once 'src/Alumno.php';
require_once 'src/AlumnoMateria.php';
require_once 'src/Materia.php';

$alumno = new Alumno();
$alumno->setNombre('juana');
$entityManager->persist($alumno);
$entityManager->flush();
echo 'Alumno: ' . $alumno->getId() . "<hr>";

$materia = new Materia();
$materia->setMateria('lengua');
$entityManager->persist($materia);
$entityManager->flush();
echo 'Materia: ' . $materia->getId() . "<hr>";

$alma = new AlumnoMateria();
$alma->setIdalumno($alumno->getId());
$alma->setIdmateria($materia->getId());
$entityManager->persist($alma);
$entityManager->flush();
echo 'Alumno materia: ' . $alma->getId() . "<hr>";