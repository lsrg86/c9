<?php

require('../classes/Upload.php');
$archivo = new Upload('archivo');
$archivo->setPolicy(Upload::POLICY_KEEP);
$archivo->setTarget('./privado/');
$r = $archivo->upload();