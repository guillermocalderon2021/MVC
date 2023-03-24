<?php
require_once 'Model.php';
class UsuariosModel extends Model{

    public function validateUser($user,$pass){
        $query="SELECT usuario, id_tipo_usuario FROM usuarios
        WHERE usuario=:user AND password=SHA2(:pass,256)";
        return $this->getQuery($query,['user'=>$user, 'pass'=>$pass]);
    }
}