<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4110d6303da49fffb035b9e4e0386b3b
{
    public static $files = array (
        'e320f53bb3364b7ed572ecc5ef33c5cf' => __DIR__ . '/../..' . '/app/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4110d6303da49fffb035b9e4e0386b3b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4110d6303da49fffb035b9e4e0386b3b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4110d6303da49fffb035b9e4e0386b3b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}