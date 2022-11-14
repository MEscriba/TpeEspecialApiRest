<?php
require_once './app/models/asociation.model.php';
require_once './app/views/api.view.php';
require_once './app/helpers/auth-api.helper.php';
class AsociationController{
    private $model;
    private $view;
    private $data;
    private $helper;

    public function __construct(){
        $this->model = new AsociationModel();
        $this->view = new ApiView();
        $this->helper = new AuthApiHelper();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function getAsociations($params = null){
        //ordenar
        //endpoint: /api/specifications?orderby=precio
        if (isset($_GET['orderby'])){
            $asociations = $this->model->getAllOrder($_GET['orderby']);
            $this->view->response($asociations);
        }
        //paginacion
        //endpoint: /api/specifications?page=page?limit=limit
        elseif(isset($_GET['page'])&&(isset($_GET['limit']))){
            $page =$_GET['page'];
            $limit =$_GET['limit'];
            try{
                if((is_numeric($page))&&(is_numeric($limit))){
                    $start = ($page-1) * $limit;

                    $asociations = $this->model->paginate($start,$limit);
                    $this->view->response($asociations);    
                }else
                    $this->view->response("debe ingresar un numero", 400);    
                                
            }
            catch (PDOException $e){
                $this->view->response("ingrese numeros positivos para la paginacion", 400);
            }
        }
        else{
        $asociations = $this->model->getAll();
        $this->view->response($asociations);
        }
    }

    public function getAsociation($params = null){
        $id = $params[':ID'];
        $asociation = $this->model->get($id);
        if($asociation){
            $this->view->response($asociation);
        }
        else{
            $this->view->response("la asociacion con id=$id no existe", 404);
        }
        
    }

    public function insertAsociation($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $asociation = $this->getData();
    
            if((empty($asociation->asociacion))||(empty($asociation->region))){
                $this->view->response("complete todos los datos", 400);
            }else
                $id = $this->model->insert($asociation->asociacion, $asociation->region);
                $asociation = $this->model->get($id);
                $this->view->response($asociation, 201);
        

    }

    public function deleteAsociation($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $id = $params[':ID'];
        $asociation = $this->model->get($id);
        if($asociation){
            $this->model->delete($id);
            $this->view->response($asociation);
        }else
            $this->view->response("el asociacion con id=$id no existe", 404);
    }

    public function updateAsociation($params = null){
        if(!$this->helper->isLoggedIn()){
            $this->view->response("No estas logeado", 401);
            return;
        }
        $asociation = $this->getData();
        $id = $params[':ID'];
        
        if((empty($asociation->asociacion))||(empty($asociation->region))){
            $this->view->response("complete todos los datos", 400);
        }else
        $this->model->update($asociation->asociacion, $asociation->region, $id);
        $asociation = $this->model->get($id);
        $this->view->response( $asociation);
    }
}