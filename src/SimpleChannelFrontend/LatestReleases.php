<?php
namespace pear2\SimpleChannelFrontend;
use pear2\Pyrus\Channel;

class LatestReleases extends \ArrayIterator
{
    function __construct($options = array())
    {
        $packages = array();

        foreach (new \pear2\Pyrus\Channel\RemotePackages($options['frontend']::$channel) as $package)
        {
            foreach ($package as $version=>$info) {
                $packages[$package->date.' '.$package->time] = array('version'=>$version, 'package'=>$package);
            }
        }

        krsort($packages);

        parent::__construct($packages);
    }
}
