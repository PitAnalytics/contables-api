<?php

namespace App\Modules\Primitives;

use App\Modules\Interfaces\BigqueryConnectionInterface as BigqueryConnectionInterface;

class BigqueryConnection{

  protected $bigquery;

  public function __construct($bigquery){

    $this->bigquery=$bigquery;

  }

}

?>