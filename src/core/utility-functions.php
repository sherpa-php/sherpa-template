<?php

use Sherpa\Core\debugging\Debug;
use Sherpa\Core\rendering\exceptions\ViewDoesNotExistException;
use Sherpa\Template\core\Render;

function dump(mixed ...$args): void
{
    Debug::dump(...$args);
}

function dd(mixed ...$args): void
{
    Debug::dd(...$args);
}

/** @throws ViewDoesNotExistException */
function render_php(string $viewName, array $props = []): void
{
    Render::php($viewName, $props);
}