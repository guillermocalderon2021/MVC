<?php
require_once 'Controller.php';
require_once './Model/EditorialesModel.php';
class EditorialesController extends Controller{

    private $model;

    function __construct(){
        $this->model=new EditorialesModel();
    }

    public function list(){
        $viewBag=array();
        $editoriales=$this->model->get();
        $viewBag['nombre']="Fulanito";
        $viewBag['editoriales']=$editoriales;
        $this->render("list.php",$viewBag);
    }

    public function details($id){
        $viewBag=array();
        $editorial=$this->model->get($id);
        $viewBag['editorial']=$editorial[0];
        $this->render("details.php",$viewBag);
    }

}