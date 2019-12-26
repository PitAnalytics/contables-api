<?php

namespace App\Modules\Concrete;

use App\Modules\Primitives\BigQueryConnection as Connection;

class Cuenta extends Connection{

  public function index(){

    $sql ="SELECT
    Conceptos.id AS idConcepto,
    Conceptos.superConcepto AS superConcepto,
    Conceptos.concepto AS concepto,
    Cuentas.cuenta AS cuenta
  FROM
    `pit-analytics-2019.QLIK.Conceptos` AS Conceptos
  INNER JOIN
    `pit-analytics-2019.QLIK.Cuentas` AS Cuentas
  ON
    Conceptos.id = Cuentas.idConcepto
    ORDER BY Conceptos.id;";
    return $this->bigquery->query($sql);

  }
  public function cuenta(){

    $sql="SELECT DISTINCT(cuenta) AS cuenta 
    FROM 
    (SELECT 
        Conceptos.id AS idConcepto, 
        Conceptos.superConcepto AS superConcepto, 
        Conceptos.concepto AS concepto, 
        Cuentas.cuenta AS cuenta 
      FROM
        `pit-analytics-2019.QLIK.Conceptos` AS Conceptos
      INNER JOIN
        `pit-analytics-2019.QLIK.Cuentas` AS Cuentas
      ON
        Conceptos.id = Cuentas.idConcepto);";
    return $this->bigquery->query($sql);

  }

}
?>