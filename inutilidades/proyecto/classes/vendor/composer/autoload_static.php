<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1e2a3f13696412887f9d80023e7067b8
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1e2a3f13696412887f9d80023e7067b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1e2a3f13696412887f9d80023e7067b8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
