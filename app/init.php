<?php

use App\core\Core;
define('APP_PATH', __DIR__ . '/..');

require_once APP_PATH . '/vendor/autoload.php';
require_once '../app/config/config.php';
spl_autoload_register(function($className){
    require_once '../app/core/'. $className . '.php';
});
$init = new Core;