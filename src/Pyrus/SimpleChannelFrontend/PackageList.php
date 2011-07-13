<?php
namespace Pyrus\SimpleChannelFrontend;
class PackageList extends \Pyrus\Channel\RemotePackages
{
    function __construct($options = array())
    {
        parent::__construct($options['frontend']->getChannel());
    }
}
