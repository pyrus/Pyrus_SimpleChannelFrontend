<?php
namespace pear2\SimpleChannelFrontend;
class Categories extends \pear2\Pyrus\Channel\Remotecategories
{
    
    function __construct($options = array())
    {
        parent::__construct($options['frontend']::$channel);
    }
}