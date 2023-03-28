<?php
require_once 'Controller.php';
require_once './Model/UsuariosModel.php';

class UsuariosController extends Controller{

    public function login(){
        $this->render("login.php");
    }

    
    public function logout(){
        session_unset();
        session_destroy();
        header('location:'.PATH.'/Usuarios/login');

    }
    public function validate(){
        $model=new UsuariosModel();
        $user=$_POST['usuario'];
        $pass=$_POST['clave'];
        
        if(!empty($model->validateUser($user,$pass))){
            $login_data=$model->validateUser($user,$pass);
            $login_data=$login_data[0];
            $_SESSION['login_data']=$login_data;
            header('location:'.PATH.'/Libros');
           // 
        }
        else{
            $errores=array();
            $viewBag=array();
            array_push($errores,"El usuario y/o password son incorrectos");
            $viewBag['errores']=$errores;
            $this->render("login.php",$viewBag);
        }
    }
}