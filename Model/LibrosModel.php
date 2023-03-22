<?php
require_once 'Model.php';
class LibrosModel extends Model{

    public function get($id=''){
        if($id==''){
            $query="SELECT L.codigo_libro, L.nombre_libro, L.existencias, L.precio, A.nombre_autor,
            E.nombre_editorial, G.nombre_genero
            FROM libros L INNER JOIN autores A ON A.codigo_autor = L.codigo_autor
            INNER JOIN editoriales E ON E.codigo_editorial = L.codigo_editorial
            INNER JOIN generos G ON G.id_genero = L.id_genero";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT L.codigo_libro, L.nombre_libro, L.existencias, L.precio, A.nombre_autor,
            E.nombre_editorial, G.nombre_genero
            FROM libros L INNER JOIN autores A ON A.codigo_autor = L.codigo_autor
            INNER JOIN editoriales E ON E.codigo_editorial = L.codigo_editorial
            INNER JOIN generos G ON G.id_genero = L.id_genero WHERE L.codigo_libro=:codigo_libro";
            return $this->getQuery($query,['codigo_libro'=>$id]);
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