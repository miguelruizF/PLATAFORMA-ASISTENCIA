<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb0d557dd108e5c1694ff1311ad82e31
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'SimpleXLSX' => __DIR__ . '/..' . '/shuchkin/simplexlsx/src/SimpleXLSX.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitcb0d557dd108e5c1694ff1311ad82e31::$classMap;

        }, null, ClassLoader::class);
    }
}
