<?php
require_once 'Controller.php';
require_once './Model/UsuariosModel.php';

class UsuariosController extends Controller{

    public function checkUser(){
        $model=new UsuariosModel();
        $user="guille";
        $pass="1234567";
        $tipo=$model->validateUser($user,$pass);
        var_dump($tipo);
    }
}