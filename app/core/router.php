<?php
$app->get('/bseg', \App\Controllers\Api\BsegController::class.':index');
$app->get('/bseg/fecha', \App\Controllers\Api\BsegController::class.':fecha');
$app->get('/bseg/moneda', \App\Controllers\Api\BsegController::class.':moneda');
$app->get('/bseg/sociedad-sap', \App\Controllers\Api\BsegController::class.':sociedadSap');
$app->get('/bseg/tipo-documento', \App\Controllers\Api\BsegController::class.':tipoDocumento');
//
?>