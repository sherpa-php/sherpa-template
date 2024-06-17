<?php

/*
 * Main routes repository
 */


use Sherpa\Core\router\Router;
use Sherpa\Template\controllers\HomeController;


Router::get("/quentin", HomeController::class, "render");