<?php

namespace Sherpa\Template\core;

use Sherpa\Core\rendering\exceptions\ViewDoesNotExistException;

class Render
{

    /**
     * @throws ViewDoesNotExistException
     */
    public static function php(string $viewName, array $props = []): void
    {
        if (!View::isPhpViewExisting($viewName))
        {
            throw new ViewDoesNotExistException();
        }

        extract($props);

        require_once "phpViewFunctions.php";

        include "../views/$viewName.view.php";
    }

}