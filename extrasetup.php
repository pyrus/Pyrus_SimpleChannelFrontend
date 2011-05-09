<?php
/**
 * This file is used to provide extra files/packages outside package.xml
 */
$pyrus = new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_Pyrus/package.xml');
$pyrus->setPackagingFilter('PEAR2\Pyrus\PackageFile\v2Iterator\MinimalPackageFilter');

$extrafiles = array(
    new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_HTTP_Request/package.xml'),
    new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_Console_CommandLine/package.xml'),
    new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_MultiErrors/package.xml'),
    new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_Exception/package.xml'),
    $pyrus,
    new \PEAR2\Pyrus\Package(__DIR__ . '/../PEAR2_Templates_Savant/package.xml'),
);