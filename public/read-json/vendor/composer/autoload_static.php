<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfd8e31332e1ac06a675d49176aa14101
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JsonStreamingParser\\Test\\' => 25,
            'JsonStreamingParser\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JsonStreamingParser\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/salsify/json-streaming-parser/tests',
        ),
        'JsonStreamingParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/salsify/json-streaming-parser/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfd8e31332e1ac06a675d49176aa14101::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfd8e31332e1ac06a675d49176aa14101::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
