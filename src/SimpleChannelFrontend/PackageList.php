<?php
namespace pear2\SimpleChannelFrontend;
class PackageList
{
    public $directory;
    
    public $packages = array();
    
    function __construct($options = array())
    {
        $this->directory = $options['frontend']::$channel->path;
        
        Internet::addDirectory($this->directory,
                       'http://pear2.php.net/');
        \pear2\Pyrus\Main::$downloadClass = __NAMESPACE__ . '\\Internet';
        \pear2\Pyrus\Config::current()->cache_dir = '/tmp';
        $chan = \pear2\Pyrus\Config::current()->channelregistry['pear2.php.net'];
        $this->packages = array();
        foreach ($chan->remotepackages as $package) {
            $this->packages[] = $package->name;
        }
        sort($this->packages);
    }
}
