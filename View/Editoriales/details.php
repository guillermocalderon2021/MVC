<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de un editorial</title>
</head>
<body>
    <h1>Nombre: <?= $editorial['nombre_editorial'] ?></h1>
    <ul>
        <li>Codigo: <?= $editorial['codigo_editorial'] ?> </li>
        <li>Contacto: <?= $editorial['contacto'] ?></li>
        <li>Telefono: <?= $editorial['telefono'] ?></li>
    </ul>
</body>
</html>