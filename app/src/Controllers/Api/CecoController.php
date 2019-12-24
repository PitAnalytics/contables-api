<?php

namespace App\Controllers\Api;

use App\Controllers\Primitives\Controller as Controller;
use Psr\Container\ContainerInterface as Container;

class CecoController extends Controller{
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

    $this->modules['ceco']=$this->container['ceco']($this->bigquery);

  }
  //
  public function index($request,$response){

    $index = $this->modules['ceco']->index();
    //preparamos respuesta
    $response = json_encode($index);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }

}


?>