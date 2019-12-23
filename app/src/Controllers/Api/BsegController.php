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

    $this->modules['bseg']->index();

  }
  public function fecha($request,$response){

  }
  public function moneda($request,$response){

    $this->modules['bseg']->moneda();

  }
  public function sociedadSap($request,$response){

    $this->modules['bseg']->sociedadSap();

  }
  public function tipoDocumento($request,$response){

    $this->modules['bseg']->tipoDocumento();

  }

}


?>