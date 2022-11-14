<?php	
require_once './libs/router.php';
require_once './app/controllers/asociations-api.controller.php';
require_once './app/controllers/umpires-api.controller.php';
require_once './app/controllers/auth-api.controller.php';


$router = new Router();
//arbitro
$router->addRoute('umpires', 'GET', 'UmpireController', 'getUmpires');
$router->addRoute('umpires/:ID', 'GET', 'UmpireController', 'getUmpire');
$router->addRoute('umpires', 'POST', 'UmpireController', 'insertUmpire');
$router->addRoute('umpires/:ID', 'DELETE', 'UmpireController', 'deleteUmpire');
$router->addRoute('umpires/:ID', 'PUT', 'UmpireController', 'updateUmpire');
//asociacion
$router->addRoute('asociations', 'GET', 'AsociationController', 'getAsociations');
$router->addRoute('asociations/:ID', 'GET', 'AsociationController', 'getAsociation');
$router->addRoute('asociations', 'POST', 'AsociationController', 'insertAsociation');
$router->addRoute('asociations/:ID', 'DELETE', 'AsociationController', 'deleteAsociation');
$router->addRoute('asociations/:ID', 'PUT', 'AsociationController', 'updateAsociation');
//auth
$router->addRoute("auth/token", 'GET', 'AuthApiController', 'getToken');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);