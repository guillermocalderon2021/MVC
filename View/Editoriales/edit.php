<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificando editorial</title>
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
                <h3>Editando editorial</h3>
            </div>
            <div class="row">
                <div class=" col-md-7">
                    <?php
                        if(isset($errores)){
                            if(count($errores)>0){
                                echo "<div class='alert alert-danger'><ul>";
                                foreach ($errores as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo "</ul></div>";

                            }
                        }

                            
                    ?>
                   
                    <form role="form" action="<?= PATH ?>/Editoriales/update/<?= $editorial['codigo_editorial'] ?>" method="POST">
                        <input type="hidden" name="op" value="insertar"/>
                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group">
                            <label for="codigo">Codigo del editorial:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" 
                                name="codigo_editorial" id="codigo_editorial" readonly="true"
                                value="<?= isset($editorial)?$editorial['codigo_editorial']:'' ?>"  placeholder="Ingresa el codigo del editorial" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre del editorial:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" 
                                name="nombre_editorial" id="nombre_editorial"  
                                 placeholder="Ingresa el nombre del editorial" 
                                 value="<?= isset($editorial)?$editorial['nombre_editorial']:'' ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contacto">Contacto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="contacto" 
                                name="contacto"   placeholder="Ingresa el nombre del contacto"
                                value="<?= isset($editorial)?$editorial['contacto']:'' ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="telefono" 
                                name="telefono"  placeholder="Ingresa el telefono del contacto" 
                                value="<?= isset($editorial)?$editorial['telefono']:'' ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="#">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>

</body>
</html>
        