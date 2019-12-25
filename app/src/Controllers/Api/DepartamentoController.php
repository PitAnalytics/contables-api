<?php

namespace App\Controllers\Api;

use App\Controllers\Primitives\Controller as Controller;
use Psr\Container\ContainerInterface as Container;

class DepartamentoController extends Controller{
  //
  public function __construct(Container $container){
    //
    $this->container=$container;
    $this->setMainInstances();
    $this->setGoogleInstances();
    $this->setModuleInstances();

  }
  //
  protected function setMainInstances(){

    $this->config=$this->container['config'];
    $this->globals=$this->config->globals();

  }
  //
  protected function setGoogleInstances(){

    $this->bigquery=$this->container['bigquery']($this->config->google('bigquery'));

  }
  //
  protected function setModuleInstances(){

    $this->modules['departamento']=$this->container['departamento']($this->bigquery);

  }
  //
  public function index($request,$response){

    $index = $this->modules['departamento']->index();
    //respuesta con cabeceras http
    $response1 = $response->withJson($index,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  //
  public function idDepartamento($request,$response){

    $ceco = $this->modules['departamento']->idDepartamento();
    //respuesta con cabeceras http
    $response1 = $response->withJson($ceco,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }

  //
  public function area($request,$response){

    $ceco = $this->modules['departamento']->area();
    //respuesta con cabeceras http
    $response1 = $response->withJson($ceco,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }

}


?>