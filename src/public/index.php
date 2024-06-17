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


RouterLoader::prepareRoutesRepositories();


$currentRoute = Router::getRouteByPath($_GET["route"]);

if ($currentRoute === null)
{
    echo "404 Not Found";
    die;
}

$currentRoute->run();