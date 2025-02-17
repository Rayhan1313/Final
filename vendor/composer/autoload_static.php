<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49c567d3adbab1a83dd123e04a94096e
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rayhan\\Final\\' => 13,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rayhan\\Final\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit49c567d3adbab1a83dd123e04a94096e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit49c567d3adbab1a83dd123e04a94096e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit49c567d3adbab1a83dd123e04a94096e::$classMap;

        }, null, ClassLoader::class);
    }
}
