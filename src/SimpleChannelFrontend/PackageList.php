<?php
namespace pear2\SimpleChannelFrontend;
class PackageList
{
    public $directory;
    
    public $packages = array();
    
    function __construct($options = array())
    {
        $this->packages = array();
        foreach ($options['frontend']::$channel->remotepackages as $package) {
            $this->packages[] = $package->name;
        }
        sort($this->packages);
    }
}
