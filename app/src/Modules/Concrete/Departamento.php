<?php

namespace App\Modules\Concrete;

use App\Modules\Primitives\BigQueryConnection as Connection;

class Departamento extends Connection{

  public function index(){

    $sql ="SELECT
    id AS idDepartamento,
    sucursal AS departamento,
    area
  FROM
    `pit-analytics-2019.QLIK.Sucursales`
  ORDER BY
    id;";
    return $this->bigquery->query($sql);

  }
  public function idDepartamento(){

    $sql="SELECT DISTINCT(id) AS idDepartamento FROM `pit-analytics-2019.QLIK.Sucursales`";
    return $this->bigquery->query($sql);

  }

  public function area(){

    $sql="SELECT DISTINCT(area) AS area FROM `pit-analytics-2019.QLIK.Sucursales`";
    return $this->bigquery->query($sql);

  }

}
?>