<?php

use Dotenv\Dotenv;
use Sherpa\Core\router\Router;
use Sherpa\Core\utilities\toolbar\Toolbar;
use Sherpa\Template\routes\core\RouterLoader;

$startTime = microtime(true);

session_start();

const ROOT = "../..";


require_once ROOT . "/vendor/autoload.php";


$env = Dotenv::createImmutable(ROOT);
$env->load();