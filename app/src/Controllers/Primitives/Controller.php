<?php

namespace App\Controllers\Primitives;

use Psr\Container\ContainerInterface as Container;

abstract class Controller{

    protected $container;
    protected $config;
    protected $bigquery;

    public abstract function __construct(Container $container);

}

?>