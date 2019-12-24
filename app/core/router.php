<?php
$app->get('/bseg', \App\Controllers\Api\BsegController::class.':index');
$app->get('/bseg/fecha', \App\Controllers\Api\BsegController::class.':fecha');
$app->get('/bseg/moneda', \App\Controllers\Api\BsegController::class.':moneda');
$app->get('/bseg/sociedad-sap', \App\Controllers\Api\BsegController::class.':sociedadSap');
$app->get('/bseg/tipo-documento', \App\Controllers\Api\BsegController::class.':tipoDocumento');
//
$app->get('/ceco', \App\Controllers\Api\CecoController::class.':index');
$app->get('/ceco/ceco', \App\Controllers\Api\CecoController::class.':ceco');
?>