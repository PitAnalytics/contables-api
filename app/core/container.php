<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,'responseChunkSize' => 8096]]);
//
$container=$app->getContainer();
//
$container['config']=function($container){

    return App\Config\Config::instanciate('../app/src/Config/Config.json');

};
//
$container['bigquery']=function($container){

    return function($config){

        return App\Tools\BigQueryClient::instanciate($config);

    };

};
//
$container['bseg']=function($container){

    return function($bigquery){

        return new App\Modules\Concrete\Bseg($bigquery);

    };

};
//
$container['ceco']=function($container){

    return function($bigquery){

        return new App\Modules\Concrete\Ceco($bigquery);

    };

};
//
$container['departamento']=function($container){

    return function($bigquery){

        return new App\Modules\Concrete\Departamento($bigquery);

    };

};
//
$container['cuenta']=function($container){

    return function($bigquery){

        return new App\Modules\Concrete\Cuenta($bigquery);

    };

};
?>