<?php

use Dotenv\Dotenv;
use Sherpa\Core\router\Router;
use Sherpa\Core\utilities\toolbar\Toolbar;
use Sherpa\Template\core\RouterLoader;

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


// DO NOT ADD CODE ABOVE THIS LINE

$endTime = microtime(true);

$loadingTime = $endTime
    ? ($endTime - $startTime) / 1_000
    : 0;


if ($_ENV["ENABLE_TOOLBAR"])
{
    Toolbar::render($currentRoute, intval($loadingTime));
}