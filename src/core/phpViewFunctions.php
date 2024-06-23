<?php

/*
 * PHP view rendering system utilities functions.
 */


use Sherpa\Template\core\View;

function component(string $name, array $props = []): void
{
    if (View::isPhpComponentExisting($name))
    {
        extract($props);

        include "../views/components/$name.view.php";
    }
}