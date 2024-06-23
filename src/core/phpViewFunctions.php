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

        include "../views/components/$name{$_ENV['VIEW_COMPONENT_FILE_EXTENSION']}.php";
    }
}