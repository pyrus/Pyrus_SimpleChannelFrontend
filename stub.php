#!/usr/bin/env php
<?php
/**
 * If your package does special stuff in phar format, use this file.  Remove if
 * no phar format is ever generated
 */
//if (version_compare(phpversion(), '5.3.1', '<')) {
//    if (substr(phpversion(), 0, 5) != '5.3.1') {
//        // this small hack is because of running RCs of 5.3.1
//        echo "PEAR2_SimpleChannelFrontend requires PHP 5.3.1 or newer.
//";
//        exit -1;
//    }
//}
ini_set('display_errors', true);
error_reporting(E_ALL);
foreach (array('phar', 'spl', 'pcre', 'simplexml') as $ext) {
    if (!extension_loaded($ext)) {
        echo 'Extension ', $ext, " is required
";
        exit -1;
    }
}
try {
    Phar::mapPhar();
} catch (Exception $e) {
    echo "Cannot process PEAR2_SimpleChannelFrontend phar:
";
    echo $e->getMessage(), "
";
    exit -1;
}
function PEAR2_SimpleChannelFrontend_autoload($class)
{
    $class = str_replace('_', '\\', $class);
    if (file_exists('phar://' . __FILE__ . '/PEAR2_SimpleChannelFrontend-0.1.0/php/' . implode('/', explode('\\', $class)) . '.php')) {
        include 'phar://' . __FILE__ . '/PEAR2_SimpleChannelFrontend-0.1.0/php/' . implode('/', explode('\\', $class)) . '.php';
    }
}
spl_autoload_register("PEAR2_SimpleChannelFrontend_autoload");
$phar = new Phar(__FILE__);
$sig = $phar->getSignature();
define('PEAR2_SimpleChannelFrontend_SIG', $sig['hash']);
define('PEAR2_SimpleChannelFrontend_SIGTYPE', $sig['hash_type']);

// your package-specific stuff here, for instance, here is what Pyrus does:
if (file_exists('config.inc.php')) {
    require_once 'config.inc.php';
} elseif (file_exists('channel.xml')) {
    $channel = new \pear2\Pyrus\ChannelFile('channel.xml');
} else {
    echo 'You must place this file in your channel server, or provide a config.inc.php file.';
    exit();
}

$frontend = new pear2\SimpleChannelFrontend\Main($channel, $_GET);

$savant = new pear2\Templates\Savant\Main();
$savant->setClassToTemplateMapper(new pear2\SimpleChannelFrontend\TemplateMapper);
$savant->setTemplatePath(array('phar://'. __FILE__ .'/PEAR2_SimpleChannelFrontend-0.1.0/www/PEAR2_SimpleChannelFrontend/pear2.php.net/templates'));
echo $savant->render($frontend);



/**
 * $frontend = new \pear2\Pyrus\ScriptFrontend\Commands;
 * @array_shift($_SERVER['argv']);
 * $frontend->run($_SERVER['argv']);
 */
__HALT_COMPILER();
