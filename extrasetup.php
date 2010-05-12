<?php
/**
 * This file is used to provide extra files/packages outside package.xml
 */
$pyrus = new \PEAR2\Pyrus\Package(__DIR__ . '/../../Pyrus/package.xml');
$pyrus->setPackagingFilter('PEAR2\Pyrus\PackageFile\v2Iterator\MinimalPackageFilter');
if (basename(__DIR__) == 'trunk') {
    $extrafiles = array(
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../HTTP_Request/trunk/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../sandbox/Console_CommandLine/trunk/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../MultiErrors/trunk/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../Exception/trunk/package.xml'),
    );
} else {
    $extrafiles = array(
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../HTTP_Request/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../Console_CommandLine/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../MultiErrors/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../Exception/package.xml'),
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../Exception/package.xml'),
        $pyrus,
        new \PEAR2\Pyrus\Package(__DIR__ . '/../../Templates_Savant/package.xml'),
    );
}