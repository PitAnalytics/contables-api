<?php

namespace App\Controllers\Api;
//
use App\Controllers\Primitives\Controller as Controller;
use Psr\Container\ContainerInterface as Container;
//
class CuentaController extends Controller{
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

    $this->modules['cuenta']=$this->container['cuenta']($this->bigquery);

  }
  //
  public function index($request,$response){

    $index = $this->modules['cuenta']->index();
    //respuesta con cabeceras http
    $response1 = $response->withJson($index,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  //
  public function cuenta($request,$response){

    $ceco = $this->modules['cuenta']->cuenta();
    //respuesta con cabeceras http
    $response1 = $response->withJson($ceco,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  //
  public function concepto($request,$response){

    $ceco = $this->modules['cuenta']->concepto();
    //respuesta con cabeceras http
    $response1 = $response->withJson($ceco,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  //
  public function superConcepto($request,$response){

    $ceco = $this->modules['cuenta']->superConcepto();
    //respuesta con cabeceras http
    $response1 = $response->withJson($ceco,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }

}


?>