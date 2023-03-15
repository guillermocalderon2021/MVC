<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de editoriales</title>
</head>
<body>
    <h1>Lista de editoriales</h1>
    <h2><?= $nombre ?></h2>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Telefono</th>
            <th>Operaciones</th>
        </tr>
        <?php
            foreach($editoriales as $editorial){
        ?>
        <tr>
            <td><?=$editorial['codigo_editorial'] ?></td>
            <td><?=$editorial['nombre_editorial'] ?></td>
            <td><?=$editorial['contacto'] ?></td>
            <td><?=$editorial['telefono'] ?></td>
            <td></td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>