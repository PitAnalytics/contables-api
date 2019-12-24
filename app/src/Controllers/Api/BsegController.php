<?php

namespace App\Controllers\Api;

use App\Controllers\Primitives\Controller as Controller;
use Psr\Container\ContainerInterface as Container;

class BsegController extends Controller{
  
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

    $this->modules['bseg']=$this->container['bseg']($this->bigquery);

  }
  //
  public function index($request,$response){

    $index = $this->modules['bseg']->index();
    //preparamos respuesta
    $response = json_encode($index);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }
  public function fecha($request,$response){

    $fecha = $this->modules['bseg']->fecha();
    //preparamos respuesta
    $response = json_encode($fecha);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }
  public function moneda($request,$response){

    $moneda = $this->modules['bseg']->moneda();
    //preparamos respuesta
    $response = json_encode($moneda);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }
  public function sociedadSap($request,$response){

    $sociedadSap = $this->modules['bseg']->sociedadSap();

    //preparamos respuesta
    $response = json_encode($sociedadSap);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }
  public function tipoDocumento($request,$response){

    $tipoDocumento = $this->modules['bseg']->tipoDocumento();

    //preparamos respuesta
    $response = json_encode($tipoDocumento);
    $response1 = $response
    ->withHeader('Content-type','application/json; charset=utf-8')
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response1;

  }

}


?>