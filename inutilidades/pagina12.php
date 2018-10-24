<?php
require 'classes/Autoload.php';
$db = new Database();
if ($db->connect()) {
    $conexion = $db->getConnection();
    $sql = 'select * from producto';
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();
} else {
    echo 'NO Conectado';
    exit();
}
$op = Reader::get('op');
$mensaje = '';
if($op !== null) {
    $mensaje = '<h1>El resultado de ' . $op . ' es ' . Reader::get('resultado') . '</h1>';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tabla Producto</title>
        <style type="text/css">
            table, thead, tr, th, td { border: 2px solid pink; padding: 5px;}
        </style>
    </head>
    <body>
        <?= $mensaje ?>
        <table border = "1" name = "tablaP" id = "tablaProducto">
            <thead>
                <tr>
                    <th><input type="checkbox" id = "marcarTodo"/></th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Observaciones</th>
                    <th>Borrar</th>
                    <th>Borrar 2</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $sentencia->fetch() ) {
                        $producto = new Producto();
                        $producto->set($fila);
                        $nombre = urlencode($producto->getNombre());
                        ?>
                        <tr >
                            <td><input type="checkbox" name="ids[]" value="<?= $producto->getId() ?>" form="fBorrar"/></td>
                            <td><?php echo $producto->getId(); ?></td>
                            <td><?= $producto->getNombre() ?></td>
                            <td><?= $producto->getPrecio() ?></td>
                            <td><?= $producto->getObservaciones() ?></td>
                            <td><a href="pagina12borrar.php?id=<?= $producto->getId() ?>" class = "borrar">Borrar</a></td>
                            <td><a href="pagina12borrar.php?id=<?= $producto->getId() ?>&nombre=<?= $nombre ?>" class = "borrar">Borrar</a></td>
                            <td><a href="pagina12editar.php?id=<?= $producto->getId() ?>" class = "editar">Editar</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
        <form action="pagina12alta.php" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="nombre del producto"/>
            <input type="number" step="0.001" name="precio" id="precio" placeholder="precio del producto"/>
            <textarea name="observaciones" id="observaciones" placeholder="observaciones sobre el producto"></textarea>
            <input type="submit" value="alta"/>
        </form>
        <form action="pagina12borrarv2.php" method="post" name="fBorrar" id="fBorrar">
            <input type="submit" value="borrar"/>
        </form>
        <form action="pagina12editar.php" method="post" name="fEditar" id="fEditar">
            <input type="hidden" name="id" id="id" value="" />
        </form>
        <script src="js/borrar.js"></script>
        <script src="js/borrarmultiple.js"></script>
    </body>
</html>
<?php
$sentencia->closeCursor();