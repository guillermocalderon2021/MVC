<?php
if (isset($_SESSION['success_message'])){
?>
<script>
alertify.success('<?=$_SESSION['success_message'] ?>');
</script>
<?php 
unset($_SESSION['success_message']);
} ?>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
                  data-toggle="collapse" data-target="#navbar" 
                  aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Desplegar navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">Ejemplo MVC</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="#">Inicio</a></li> 
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Libros<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Libros/create">Registrar libro</a></li>
                <li><a href="<?= PATH ?>/Libros">Ver lista de libros</a></li>
              </ul>
            </li>
            <?php if($_SESSION['login_data']['id_tipo_usuario']==1){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Autores <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Registrar autor</a></li>
                <li><a href="#">Ver lista de autores</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Generos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Registrar genero</a></li>
                <li><a href="#">Ver lista de generos</a></li>
              </ul>
            </li>       
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Editoriales<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= PATH ?>/Editoriales/create">Registrar editorial</a></li>
                <li><a href="<?= PATH ?>/Editoriales">Ver lista de editoriales</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['login_data']['usuario']?> (<?=$_SESSION['login_data']['id_tipo_usuario']?>) <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= PATH ?>/Usuarios/logout">Cerrar sesion</a></li>
                
              </ul>
            </li>
          </ul>

          
        </div>
      </div>
    </nav>
        
