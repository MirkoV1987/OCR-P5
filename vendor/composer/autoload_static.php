<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1daee474c0cd3ccf9a0bf1ad14868745
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
            'Manager\\' => 8,
        ),
        'F' => 
        array (
            'Framework\\' => 10,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Model',
        ),
        'Manager\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Manager',
        ),
        'Framework\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Framework',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1daee474c0cd3ccf9a0bf1ad14868745::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1daee474c0cd3ccf9a0bf1ad14868745::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}