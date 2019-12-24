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
    //respuesta con cabeceras http
    $response1 = $response->withJson($index,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  public function fecha($request,$response){

    $fecha = $this->modules['bseg']->fecha();
    //respuesta con cabeceras http
    $response1 = $response->withJson($fecha,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  public function moneda($request,$response){

    $moneda = $this->modules['bseg']->moneda();
    //respuesta con cabeceras http
    $response1 = $response->withJson($moneda,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }
  public function sociedadSap($request,$response){

    $sociedadSap = $this->modules['bseg']->sociedadSap();
    //respuesta con cabeceras http
    $response1 = $response->withJson($sociedadSap,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;


  }
  public function tipoDocumento($request,$response){

    $tipoDocumento = $this->modules['bseg']->tipoDocumento();
    //respuesta con cabeceras http
    $response1 = $response->withJson($tipoDocumento,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;

  }

}


?>