<?php
$app->get('/bseg', \App\Controllers\Api\BsegController::class.':index');
$app->get('/bseg/fecha', \App\Controllers\Api\BsegController::class.':fecha');
$app->get('/bseg/moneda', \App\Controllers\Api\BsegController::class.':moneda');
$app->get('/bseg/sociedad-sap', \App\Controllers\Api\BsegController::class.':sociedadSap');
$app->get('/bseg/tipo-documento', \App\Controllers\Api\BsegController::class.':tipoDocumento');
//
$app->get('/ceco', \App\Controllers\Api\CecoController::class.':index');
$app->get('/ceco/ceco', \App\Controllers\Api\CecoController::class.':ceco');
//
$app->get('/departamento', \App\Controllers\Api\DepartamentoController::class.':index');
$app->get('/departamento/id-departamento', \App\Controllers\Api\DepartamentoController::class.':idDepartamento');
$app->get('/departamento/area', \App\Controllers\Api\DepartamentoController::class.':area');
//
$app->get('/cuenta', \App\Controllers\Api\CuentaController::class.':index');
$app->get('/cuenta/cuenta', \App\Controllers\Api\CuentaController::class.':cuenta');
$app->get('/cuenta/concepto', \App\Controllers\Api\CuentaController::class.':concepto');
$app->get('/cuenta/super-concepto', \App\Controllers\Api\CuentaController::class.':superConcepto');
?>