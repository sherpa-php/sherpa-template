<?php

namespace Sherpa\Template\core;

class View
{

    /**
     * @param string $viewName
     * @return bool If PHP view file exists in
     *              /views/ directory
     */
    public static function isPhpViewExisting(string $viewName): bool
    {
        $viewFilename = "$viewName.view.php";
        $viewsDirectoryScan = scandir("../views/");

        return in_array($viewFilename, $viewsDirectoryScan);
    }

    /**
     * @param string $componentName
     * @return bool If PHP component file exists in
     *              /views/components/ directory
     */
    public static function isPhpComponentExisting(string $componentName): bool
    {
        $componentFilename = "$componentName.component.php";
        $componentsDirectoryScan = scandir("../views/components/");

        return in_array($componentFilename, $componentsDirectoryScan);
    }

}