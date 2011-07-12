<?php
namespace Pyrus\SimpleChannelFrontend;
class Categories extends \Pyrus\Channel\RemoteCategories
{
    function __construct($options = array())
    {
        parent::__construct($options['frontend']->getChannel());
    }
}
