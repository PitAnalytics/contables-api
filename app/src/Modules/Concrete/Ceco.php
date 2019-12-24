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
  public function idDepartamento(){

    $sql="SELECT DISTINCT(idDepartamento) AS idDepartamento FROM
    (SELECT
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
      1=1 ) AS departamentos;";

    return $this->bigquery->query($sql);

  }
  public function ceco(){

    $sql="SELECT DISTINCT(ceco) AS ceco FROM
    (SELECT
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
      1=1 ) AS departamentos;";
    return $this->bigquery->query($sql);

  }
  public function area(){

    $sql="SELECT DISTINCT(ceco) AS area FROM
    (SELECT
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
      1=1 ) AS departamentos;";
    return $this->bigquery->query($sql);

  }

}

?>