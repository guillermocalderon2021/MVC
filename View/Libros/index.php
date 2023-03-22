<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de libros</title>
    <?php
        include './View/cabecera.php';
    ?>
</head>
<body>
<?php
        include './View/menu.php';
    ?>

<div class="container">
            <div class="row">
                <h3>Lista de libros</h3>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Libros/create"> Nuevo Libro</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo del libro</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Genero</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach($libros as $libro){
                    ?>
                    <tr>
                        <td><?=$libro['codigo_libro']?></td>
                        <td><?=$libro['nombre_libro']?></td>
                        <td><?=$libro['precio']?></td>
                        <td><?=$libro['existencias']?></td>
                        <td><?=$libro['nombre_autor']?></td>
                        <td><?=$libro['nombre_editorial']?></td>
                        <td><?=$libro['nombre_genero']?></td>
                        <td><a class="btn btn-success" href="<?= PATH.'/Editoriales/edit/'.$editorial['codigo_editorial']?>">Modificar</a></td>
                    </tr>

                    <?php
                    }
                    ?>



                    </tbody>
                </table>
                </div> 
            </div>                    
        </div> 
<body>
    </html>