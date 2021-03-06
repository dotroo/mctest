<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd795b4357cfe3ce590964dfe15157e10
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'N' => 
        array (
            'Nikita\\Manychat\\' => 16,
        ),
        'M' => 
        array (
            'MVC\\Views\\' => 10,
            'MVC\\Models\\' => 11,
            'MVC\\Core\\' => 9,
            'MVC\\Controllers\\' => 16,
            'MVC\\Collections\\' => 16,
        ),
        'D' => 
        array (
            'Db\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Nikita\\Manychat\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'MVC\\Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mvc/views',
        ),
        'MVC\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mvc/models',
        ),
        'MVC\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mvc/core',
        ),
        'MVC\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mvc/controllers',
        ),
        'MVC\\Collections\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/mvc/collections',
        ),
        'Db\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Db',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd795b4357cfe3ce590964dfe15157e10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd795b4357cfe3ce590964dfe15157e10::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd795b4357cfe3ce590964dfe15157e10::$classMap;

        }, null, ClassLoader::class);
    }
}
