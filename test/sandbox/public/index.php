<?php

require __DIR__.'/../../../vendor/autoload.php';

use Zend\Mvc\Application;

use Core\Yawik;

chdir(dirname(__DIR__.'/../../'));

// Retrieve configuration
$appConfig = include __DIR__.'/../../config/config.php';
Yawik::runApplication($appConfig);
