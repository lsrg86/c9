<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="get" enctype="application/x-www-form-urlencoded" action="pagina3.php">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre" required/>
        <input type="text" name="" placeholder="pon este "/>
        <input type="submit" value="Submit"/>
    </form>
    <br>
    <form method="post" enctype="application/x-www-form-urlencoded" action="pagina3.php">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre" required/>
        <input type="submit" value="Submit"/>
    </form>
    <br>
    <form method="post" enctype="multipart/form-data" action="pagina3.php">
        <input type="text" name="nombre" placeholder="pon aqui tu nombre" required/>
        <input type="file" name="imsgen" required/>
        <input type="submit" value="Submit"/>
    </form>
    <br>
    <a href="pagina3.php">enlace1</a>
    <a href="pagina3.php?nombre=pepe">enlace2</a>
    <?php
    $valor=urlencode('pepe % & lopez');
    ?>
    <a href="pagina3.php?nombre=<?= $valor ?>">enlace3</a><br>
</body>
</html>