<?php
/**
 * This file is used to provide extra files/packages outside package.xml
 */
$pyrus = new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/Pyrus/package.xml');
$pyrus->setPackagingFilter('pear2\Pyrus\PackageFile\v2Iterator\MinimalPackageFilter');
if (basename(__DIR__) == 'trunk') {
    $extrafiles = array(
        new \pear2\Pyrus\Package(__DIR__ . '/../../HTTP_Request/trunk/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../../sandbox/Console_CommandLine/trunk/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../../MultiErrors/trunk/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../../Exception/trunk/package.xml'),
    );
} else {
    $extrafiles = array(
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/HTTP_Request/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/sandbox/Console_CommandLine/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/MultiErrors/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/Exception/package.xml'),
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/Exception/package.xml'),
        $pyrus,
        new \pear2\Pyrus\Package(__DIR__ . '/../PEAR2/Templates_Savant/package.xml'),
    );
}