<?php

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

/*$alumno = new Alumno();
$alumno->setNombre('al4');
$entityManager->persist($alumno);
$entityManager->flush();
echo 'Alumno: ' . $alumno->getId() . "<hr>";

$materia = new Materia();
$materia->setMateria('ma4');
$entityManager->persist($materia);
$entityManager->flush();
echo 'Materia: ' . $materia->getId() . "<hr>";

$alma = new AlumnoMateria();
$alma->setAlumno($alumno);
$alma->setMateria($materia);
//$alumno->addMateria($alma);
$entityManager->persist($alma);
$entityManager->flush();*/

$repositorioRegistros = $entityManager->getRepository('Alumno');
$registros = $repositorioRegistros->findAll();
foreach ($registros as $registro) {
    echo '<hr>alumno: ' . $registro->getNombre() . '<hr>';
    $materias = $registro->getMaterias();
    if(count($materias) > 0) {
        foreach($materias as $materia) {
            echo 'materia: ' . $materia->getMateria()->getMateria();
        }
    }
}