<?php
namespace pear2\SimpleChannelFrontend;
class TemplateMapper extends \pear2\Templates\Savant\ClassToTemplateMapper
{
    static protected $templatePath = '@www_dir@';

    function __construct()
    {
        if (self::$templatePath === '@'.'www_dir@') {
            // running from svn, or extracted from archive
            if (strpos(__FILE__, 'trunk/src/SimpleChannelFrontend')) {
                // running from svn
                self::$templatePath = __DIR__ . '/../../www/templates/';
            } else {
                // running from extracted archive
                self::$templatePath = __DIR__ . '/../../../www/PEAR2_SimpleChannelFrontend/pear2.php.net/templates/';
            }
        }
        static::$classname_replacement = 'pear2\\SimpleChannelFrontend\\';
    }
}
?>