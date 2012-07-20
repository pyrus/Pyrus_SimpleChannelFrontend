<?php
/**
 * This file is used to provide extra files/packages outside package.xml
 */
$pyrus = new \Pyrus\Package(__DIR__ . '/../Pyrus/package.xml');
$pyrus->setPackagingFilter('Pyrus\PackageFile\v2Iterator\MinimalPackageFilter');

$extrafiles = array(
    new \Pyrus\Package(__DIR__ . '/../PEAR2_HTTP_Request/package.xml'),
    new \Pyrus\Package(__DIR__ . '/../PEAR2_Console_CommandLine/package.xml'),
    new \Pyrus\Package(__DIR__ . '/../PEAR2_MultiErrors/package.xml'),
    new \Pyrus\Package(__DIR__ . '/../PEAR2_Exception/package.xml'),
    $pyrus,
    new \Pyrus\Package(__DIR__ . '/../PEAR2_Templates_Savant/package.xml'),
);
