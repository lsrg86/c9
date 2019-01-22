<?php

//https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/configuration.html
//https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/basic-mapping.html
//https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/association-mapping.html
//https://www.doctrine-project.org/projects/doctrine-dbal/en/2.8/reference/types.html
//https://blog.elao.com/en/dev/symfony-2-doctrine-2-cheat-sheets/
//http://gitnacho.github.io/symfony-docs-es/book/doctrine.html

require_once 'bootstrap.php';
require_once 'src/Registro.php';

$registro = new Registro();
$registro->setToken('11');
$registro->setEmail('22');
$registro->setPhone('33');
$entityManager->persist($registro);
$entityManager->flush();
echo $registro->getId() . "<hr>";