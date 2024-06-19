<?php

namespace Sherpa\Template\core;

class RouterLoader
{
    /** Routes directory path from web root. */
    private const ROUTES_DIRECTORY = "../routes/";

    /**
     * @return array Routes repositories filename list
     */
    public static function getRoutesRepositories(): array
    {
        $scan = scandir(self::ROUTES_DIRECTORY);

        return array_filter($scan, function ($element)
        {
            return is_file(self::ROUTES_DIRECTORY . "/$element")
                && pathinfo($element, PATHINFO_EXTENSION) === "php";
        });
    }

    /**
     * Find routes repository by given filename and open it.
     *
     * @param string $name
     */
    private static function prepareRoutesRepository(string $name): void
    {
        require_once self::ROUTES_DIRECTORY . "/$name";
    }

    /**
     * Find all routes repositories and open each one.
     */
    public static function prepareRoutesRepositories(): void
    {
        foreach (self::getRoutesRepositories() as $repository)
        {
            self::prepareRoutesRepository($repository);
        }
    }
}