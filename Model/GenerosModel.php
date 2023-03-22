<?php
require_once 'Model.php';
class GenerosModel extends Model{

    public function get($id=''){
        if($id==''){
            $query="SELECT * FROM generos";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM generos WHERE id_genero=:id_genero";
            return $this->getQuery($query,['id_genero'=>$id]);
        }
       
        
    }

    public function insertEditorial($editorial=array()){
        $query="INSERT INTO editoriales VALUES (:codigo_editorial,:nombre_editorial,:contacto,:telefono)";
        return $this->setQuery($query,$editorial);

    }

    public function updateEditorial($editorial=array()){
        $query="UPDATE editoriales SET nombre_editorial=:nombre_editorial, contacto=:contacto, telefono=:telefono WHERE codigo_editorial=:codigo_editorial";
        return $this->setQuery($query,$editorial);

    }

    public function removeEditorial($id){
        $query="DELETE FROM editoriales WHERE codigo_editorial=:codigo_editorial";
        return $this->setQuery($query,['codigo_editorial'=>$id]);
    }
}