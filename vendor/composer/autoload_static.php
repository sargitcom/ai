<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit211874837317c3813afccc21398d3d41
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Structures' => 
            array (
                0 => __DIR__ . '/..' . '/pear/structures_graph',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit211874837317c3813afccc21398d3d41::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}