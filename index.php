<?php
include_once 'Controller/EditorialesController.php';
$url=$_SERVER['REQUEST_URI'];
$url=explode("/",$url);
$controller=empty($url[3])?"Index":$url[3];
$controller.="Controller";
$method=empty($url[4])?"index":$url[4];
$param=empty($url[5])?"":$url[5];
$controlador=new $controller();
$controlador->$method($param);
