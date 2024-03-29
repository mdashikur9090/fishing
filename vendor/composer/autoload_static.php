<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae7d16fc13fbf6770d836687e76997bd
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae7d16fc13fbf6770d836687e76997bd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae7d16fc13fbf6770d836687e76997bd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
