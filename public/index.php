<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 16:34
 */

require_once '../App/config/config.php';

spl_autoload_register(function($className){
    require_once '../App/core/' . $className .'.php';
});

$routeHandler = new Router;