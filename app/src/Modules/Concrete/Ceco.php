<?php

namespace App\Modules\Concrete;

use App\Modules\Primitives\BigQueryConnection as Connection;

class Ceco extends Connection{

  public function index(){

    $sql ="SELECT idSucursal AS idDepartamento, ceco AS ceco FROM `pit-analytics-2019.QLIK.Ceco`;";
    return $this->bigquery->query($sql);

  }
  public function ceco(){

    $sql="SELECT DISTINCT(ceco) AS ceco FROM `pit-analytics-2019.QLIK.Ceco`;";
    return $this->bigquery->query($sql);

  }

}
?>