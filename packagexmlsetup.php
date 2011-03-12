<?php
/**
 * Extra package.xml settings such as dependencies.
 */
/**
 * for example:
$package->dependencies['required']->package['pear2.php.net/PEAR2_Autoload']->save();
$package->dependencies['required']->package['pear2.php.net/PEAR2_Exception']->save();
$package->dependencies['required']->package['pear2.php.net/PEAR2_MultiErrors']->save();
$package->dependencies['required']->package['pear2.php.net/PEAR2_HTTP_Request']->save();

$compatible->dependencies['required']->package['pear2.php.net/PEAR2_Autoload']->save();
$compatible->dependencies['required']->package['pear2.php.net/PEAR2_Exception']->save();
$compatible->dependencies['required']->package['pear2.php.net/PEAR2_MultiErrors']->save();
$compatible->dependencies['required']->package['pear2.php.net/PEAR2_HTTP_Request']->save();
*/
$package->dependencies['required']->package['pear2.php.net/PEAR2_Pyrus']->save();
$package->dependencies['required']->package['pear2.php.net/PEAR2_Templates_Savant']->save();

unset($package->files['www/config.inc.php']);
unset($package->files['www/.htaccess']);
?>
