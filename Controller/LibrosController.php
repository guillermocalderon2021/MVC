<?php
require_once 'Controller.php';
require_once './Model/LibrosModel.php';
require_once './Model/AutoresModel.php';
require_once './Model/GenerosModel.php';
require_once './Model/EditorialesModel.php';
require_once './Core/validaciones.php';
class LibrosController extends Controller{

    private $model;

    function __construct(){
        $this->model=new LibrosModel();
    }

    public function index(){
        $viewBag=array();
        $libros=$this->model->get();
        $viewBag['libros']=$libros;
        //var_dump($viewBag);
        $this->render("index.php",$viewBag);
    }

    public function create(){
        $viewBag=array();
        $generosModel=new GenerosModel();
        $autoresModel=new AutoresModel();
        $editorialesModel=new EditorialesModel();
        $viewBag['editoriales']=$editorialesModel->get();
        $viewBag['autores']=$autoresModel->get();
        $viewBag['generos']=$generosModel->get();
        //var_dump($viewBag);
        $this->render("new.php",$viewBag);
    }

    public function add(){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $editorial=array();
            $viewBag=array();
            $editorial['codigo_editorial']=$codigo_editorial;
            $editorial['nombre_editorial']=$nombre_editorial;
            $editorial['contacto']=$contacto;
            $editorial['telefono']=$telefono;

            if(estaVacio($codigo_editorial)||!isset($codigo_editorial)){
                array_push($errores,'Debes ingresar el codigo del editorial');
            }
            elseif(!esCodigoEditorial($codigo_editorial)){
                array_push($errores,'El codigo del editorial debe tener el formato EDI###');
            }

            if(estaVacio($nombre_editorial)||!isset($nombre_editorial)){
                array_push($errores,'Debes ingresar el nombre del editorial');
            }
            
            if(estaVacio($contacto)||!isset($contacto)){
                array_push($errores,'Debes ingresar el contacto'); 
            }
            
            if(estaVacio($telefono)||!isset($telefono)){
                array_push($errores,'Debes ingresar el número de telefono');
            }
            elseif(!esTelefono($telefono)){
                array_push($errores,'El telefono no tiene el formato correcto');
            }

            if(count($errores)==0){
                $this->model->insertEditorial($editorial);
                header('location:'.PATH.'/Editoriales');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['editorial']=$editorial;
                $this->render("new.php",$viewBag);
            }


            
        }
    }

    public function edit($id){
        $viewBag=array();
        $editorial=$this->model->get($id);
        $viewBag['editorial']=$editorial[0];
        $this->render("edit.php",$viewBag);
    }

    public function update($id){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $editorial=array();
            $viewBag=array();
            $editorial['codigo_editorial']=$id;
            $editorial['nombre_editorial']=$nombre_editorial;
            $editorial['contacto']=$contacto;
            $editorial['telefono']=$telefono;

            if(estaVacio($nombre_editorial)||!isset($nombre_editorial)){
                array_push($errores,'Debes ingresar el nombre del editorial');
            }
            
            if(estaVacio($contacto)||!isset($contacto)){
                array_push($errores,'Debes ingresar el contacto'); 
            }
            
            if(estaVacio($telefono)||!isset($telefono)){
                array_push($errores,'Debes ingresar el número de telefono');
            }
            elseif(!esTelefono($telefono)){
                array_push($errores,'El telefono no tiene el formato correcto');
            }

            if(count($errores)==0){
                $this->model->updateEditorial($editorial);
                header('location:'.PATH.'/Editoriales');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['editorial']=$editorial;
                $this->render("edit.php",$viewBag);
            }


            
        }
    }

}