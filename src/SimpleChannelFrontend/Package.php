<?php
namespace pear2\SimpleChannelFrontend;
class Package
{
    public $package;
    
    function __construct($options = array())
    {
        $this->package = $options['frontend']::$channel->remotepackage[$options['package']];
    }
}
?>