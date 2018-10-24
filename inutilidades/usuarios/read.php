<?php
require '../classes/Autoload.php';
$usuario = Reader::get('user');
$img = Reader::get('img');
    
?>
    

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
       
    </head>
    <body>
    <img src="data:image/*;base64,<?php echo base64_encode(file_get_contents('/home/ubuntu/privado/' . $usuario . '/' . $img));?>"/>
    </body>
</html>