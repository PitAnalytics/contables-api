<?php

namespace App\Modules\Concrete;

use App\Modules\Primitives\BigQueryConnection as Connection;

class Ceco extends Connection{

  public function index(){

    $sql ="SELECT
    departamentos.idSucursal AS idDepartamento,
    cecos.area AS area,
    departamentos.ceco AS ceco,
    cecos.sucursal AS departamento,
  FROM
    `pit-analytics-2019.QLIK.Ceco` AS departamentos
  INNER JOIN
    `pit-analytics-2019.QLIK.Cecos` AS cecos
  ON
    departamentos.ceco = cecos.numero
  WHERE
    1=1 ;";
    return $this->bigquery->query($sql);

  }
  public function fecha(){

    $sql="";
    return $this->bigquery->query($sql);

  }
  public function sociedadSap(){

    $sql="SELECT DISTINCT(BUKRS) AS sociedadSap FROM `pit-analytics-2019.QLIK.Bsegaio`;";
    return $this->bigquery->query($sql);

  }
  public function tipoDocumento(){

    $sql="SELECT DISTINCT(BLART) AS tipoDocumento FROM `pit-analytics-2019.QLIK.Bsegaio`;";
    return $this->bigquery->query($sql);

  }
  public function moneda(){

    $sql="SELECT DISTINCT(PSWSL) AS moneda FROM `pit-analytics-2019.QLIK.Bsegaio`;";
    return $this->bigquery->query($sql);

  }

}

?>