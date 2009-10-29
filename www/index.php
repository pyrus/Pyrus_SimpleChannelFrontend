<?php
require_once 'config.inc.php';

$frontend = new pear2\SimpleChannelFrontend\Main($channel, $_GET);

$savant = new pear2\Templates\Savant\Main();
$savant->setClassToTemplateMapper(new pear2\SimpleChannelFrontend\TemplateMapper);
$savant->setTemplatePath(array(__DIR__ . '/templates'));
$savant->setEscape('htmlspecialchars');
echo $savant->render($frontend);
?>