<?php

use Dotenv\Dotenv;
use Sherpa\Core\database\DB;
use Sherpa\Core\exceptions\ExceptionsManager;
use Sherpa\Core\router\Router;
use Sherpa\Core\utilities\toolbar\Toolbar;
use Sherpa\Template\core\RouterLoader;


$startTime = microtime(true);


session_start();


const ROOT = "../..";


require_once ROOT . "/vendor/autoload.php";


$env = Dotenv::createImmutable(ROOT);
$env->load();


ExceptionsManager::useExceptionHandler();


$database = DB::connect(
    $_ENV["DB_DBMS"],
    $_ENV["DB_HOST"],
    $_ENV["DB_PORT"],
    $_ENV["DB_DATABASE"],
    $_ENV["DB_USER"],
    $_ENV["DB_PASSWORD"]);


RouterLoader::prepareRoutesRepositories();


$currentRoute = Router::getRouteByPath($_GET["route"]);

// TODO: replace echo 404 by error page system
if ($currentRoute === null)
{
    echo "404 Not Found";
    die;
}

$currentRoute->run();


// --> DO NOT ADD CODE ABOVE THIS LINE <-- //

$endTime = microtime(true);

$loadingTime = $endTime
    ? ($endTime - $startTime) / 1_000
    : 0;


if (strtolower($_ENV["ENABLE_TOOLBAR"]) == "true")
{
    Toolbar::render($currentRoute, intval($loadingTime));
}