<?php
require_once './app/models/umpire.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';


class UmpireController{
    private $model;
    private $view;
    private $data;
    private $helper;
    public function __construct(){
        $this->model = new UmpireModel();
        $this->view = new ApiView();
        $this->helper = new AuthApiHelper();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getUmpires($params = null){

        //ordenar
        //endpoint: /api/umpires?orderby=ASC o DESC
        if (isset($_GET['orderby'])){
            $umpires = $this->model->getAllOrder($_GET['orderby']);
            $this->view->response($umpires);
        }
        //paginacion
        //endpoint: /api/umpires?page=page&limit=limit
        elseif(isset($_GET['page'])&&(isset($_GET['limit']))){
            $page = $_GET['page'];
            $limit = $_GET['limit'];
            try{
                if((is_numeric($page))&&(is_numeric($limit))){
                    $start = ($page-1)*$limit;
                    $umpires = $this->model->paginate($start,$limit);
                    $this->view->response($umpires);
                }else
                $this->view->response("debe ingresar un numero", 400);

            }catch (PDOException $e){
                $this->view->response("ingrese numeros positivos para la paginacion", 400);
            }
        }
        //filtro de arbitros por lugar donde reciden (me traigo los arbitros con un determinado campo)
        //endpoint: /api/umpires?filter=columna&value=valor
        elseif(isset($_GET['filter'])&&(isset($_GET['value']))){
            $filter=$_GET['filter'];
            $value=$_GET['value'];
            $umpiresByResidence=$this->model->getByResidence($filter, $value);
            if($umpiresByResidence){
                $this->view->response($umpiresByResidence);
            }else
                $this->view->response("la columna o el valor no existen", 400);           
        }
        else{
            $umpires = $this->model->getAll();
            $this->view->response($umpires);
        }
    }

    public function getUmpire($params = null){
        $id = $params[':ID'];
        $umpire = $this->model->get($id);
        if($umpire){
            $this->view->response($umpire);
        }
        else{
            $this->view->response("el arbitro con id=$id no existe", 404);
        }
        
    }

    public function deleteUmpire($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }else{
        $id = $params[':ID'];
        $umpire = $this->model->get($id);
        if($umpire){
            $this->model->delete($id);
            $this->view->response($umpire);
        }else
            $this->view->response("el arbitro con id=$id no existe", 404);
        }
    }   
    

    public function insertUmpire(){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $umpire = $this->getData();

        if((empty($umpire->arbitro))||(empty($umpire->residencia))||(empty($umpire->id_asociacion_fk))){
            $this->view->response("complete todos los datos: nombre arbitro, residencia y id_asociacion_fk", 400);
        }else{
            $id = $this->model->insert($umpire->arbitro, $umpire->residencia, $umpire->id_asociacion_fk);
            $umpire = $this->model->get($id);
            $this->view->response($umpire, 201);
        }
    }
    public function updateUmpire($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $umpire = $this->getData();
        $id = $params[':ID'];
        
        if((empty($umpire->arbitro))||(empty($umpire->residencia))||(empty($umpire->id_asociacion_fk))){
            $this->view->response("complete todos los datos", 400);
        }else{
        $this->model->update($umpire->arbitro, $umpire->residencia,$umpire->id_asociacion_fk, $id);
        $umpire = $this->model->get($id);
        $this->view->response($umpire);
        }
    }
}