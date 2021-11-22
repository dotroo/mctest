<?php

namespace MVC\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class App
{
    /**
     * @var Router
     */
    public static $router;

    /**
     * @var Kernel
     */
    public static $kernel;

    /**
     * @var Environment
     */
    public static $twig;

    public static function init()
    {
        self::$router = new Router;
        self::$kernel = new Kernel;
        $loader = new FilesystemLoader('templates');
        self::$twig = new Environment($loader, []);
    }

}