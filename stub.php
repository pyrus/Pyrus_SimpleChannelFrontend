<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
foreach (array('phar', 'spl', 'pcre', 'simplexml') as $ext) {
    if (!extension_loaded($ext)) {
        echo 'Extension ', $ext, " is required
";
        exit -1;
    }
}
function PEAR2_SimpleChannelFrontend_autoload($class)
{
    $class = str_replace('_', '\\', $class);
    if (file_exists('phar://' . __FILE__ . '/PEAR2_SimpleChannelFrontend-0.2.0/php/' . implode('/', explode('\\', $class)) . '.php')) {
        include 'phar://' . __FILE__ . '/PEAR2_SimpleChannelFrontend-0.2.0/php/' . implode('/', explode('\\', $class)) . '.php';
    }
}
spl_autoload_register("PEAR2_SimpleChannelFrontend_autoload");

define('PEAR2_SimpleChannelFrontend_Phar', true);

$mimes = array(
    'dtd'  => 'text/plain',
    'txt'  => 'text/plain',
    'css'  => 'text/css',
    'gif'  => 'image/gif',
    'htm'  => 'text/html',
    'html' => 'text/html',
    'ico'  => 'image/x-ico',
    'jpg'  => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'js'   => 'application/x-javascript',
    'png'  => 'image/png',
    'xml'  => 'text/xml',
);

function phar_rewrites($mimes)
{
    $d = 'phar://'.__FILE__.'/PEAR2_SimpleChannelFrontend-0.2.0/www/pear2.php.net/PEAR2_SimpleChannelFrontend';
    $r = $_SERVER['REQUEST_URI'];
    
    if ($r != '/' && file_exists($d . $r)) {
        $info = pathinfo($d . $r);
        if (isset($mimes[$info['extension']])) {
            header('Content-type:'.$mimes[$info['extension']]);
        }
        return $d . $r;
    }
    
    return $d . 'index.php';
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

$file = phar_rewrites($mimes);

include $file;

__HALT_COMPILER();
