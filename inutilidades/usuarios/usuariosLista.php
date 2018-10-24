<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        
    </head>
    <body>
        <p>Lista de usuarios</p>
        <ul>
            <?php
                $directorio = glob('/home/ubuntu/privado/*' , GLOB_ONLYDIR);
                
                foreach ($directorio as  $info) {
                $archi = pathinfo($info);
                $img = scandir($info,1);
                ?>
                 <li><a href="imagen.php?user=<?=$archi['basename']?>&img=<?=$img[0]?>"><?=$archi['basename']?></a> </li>
                
                 <?php   
            }
            ?>
        </ul>
    </body>
</html>