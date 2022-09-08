<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a5a07cc71c46c15f8795f1400fccd85
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4a5a07cc71c46c15f8795f1400fccd85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4a5a07cc71c46c15f8795f1400fccd85::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4a5a07cc71c46c15f8795f1400fccd85::$classMap;

        }, null, ClassLoader::class);
    }
}
