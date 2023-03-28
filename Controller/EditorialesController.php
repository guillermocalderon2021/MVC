<?php

require_once 'Controller.php';
require_once './Model/EditorialesModel.php';
require_once './Core/validaciones.php';
class EditorialesController extends Controller{

    private $model;

    function __construct(){

        if(is_null( $_SESSION['login_data'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        else if($_SESSION['login_data']['id_tipo_usuario']==2){
            echo "<h1>PRueba</h1>";
            exit;
        }

        $this->model=new EditorialesModel();
    }

    public function index(){
        $viewBag=array();
        $editoriales=$this->model->get();
        $viewBag['editoriales']=$editoriales;
        $this->render("index.php",$viewBag);
    }

    public function create(){
        $this->render("new.php");
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
                if($this->model->insertEditorial($editorial)>0){
                    $_SESSION['success_message']="Editorial creado exitosamente";
                    header('location:'.PATH.'/Editoriales');
                }
                else{
                    array_push($errores,"YA existe un editorial con este codigo");
                    $viewBag['errores']=$errores;
                    $viewBag['editorial']=$editorial;
                    $this->render("new.php",$viewBag);

                }
                

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