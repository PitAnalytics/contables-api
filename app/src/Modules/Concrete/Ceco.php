<?php

namespace App\Modules\Concrete;

use App\Modules\Primitives\BigQueryConnection as Connection;

class Ceco extends Connection{

  public function index(){

    $sql =
    "SELECT 
    BELNR AS numeroDocumento, 
    BLART AS tipoDocumento, 
    PSWSL AS moneda, 
    BUKRS AS sociedadSap, 
    CAST(DMBTR AS FLOAT64) AS importe, 
    KOSTL AS ceco, 
    BKTXT AS descripcion, 
    HKONT AS cuenta, 
    CONCAT(SUBSTR(BUDAT,7,2),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,1,4)) AS fecha 
    FROM `pit-analytics-2019.QLIK.Bsegaio` 
    WHERE KOSTL IN (SELECT DISTINCT(ceco) FROM `pit-analytics-2019.QLIK.Ceco`) 
    AND HKONT IN(SELECT DISTINCT(cuenta) FROM `pit-analytics-2019.QLIK.Cuentas`) 
    ORDER BY CAST(BUDAT AS INT64) ;";
    return $this->bigquery->query($sql);

  }
  public function fecha(){

    $sql="SELECT DISTINCT(CONCAT(SUBSTR(BUDAT,7,2),'/',SUBSTR(BUDAT,5,2),'/',SUBSTR(BUDAT,1,4))) AS fecha FROM `pit-analytics-2019.QLIK.Bsegaio`;";
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