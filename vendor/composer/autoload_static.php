<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2888272a84b16a5e8105c4de5a5f8c6
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kang\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kang\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2888272a84b16a5e8105c4de5a5f8c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2888272a84b16a5e8105c4de5a5f8c6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
