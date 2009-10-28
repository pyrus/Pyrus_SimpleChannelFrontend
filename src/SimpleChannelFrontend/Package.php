<?php
namespace pear2\SimpleChannelFrontend;
class Package
{
    public $package;
    
    public $releases = array();
    
    function __construct($options = array())
    {
        Internet::addDirectory(dirname($options['frontend']::$channel->path),
                       'http://pear2.php.net/');
        \pear2\Pyrus\Main::$downloadClass = __NAMESPACE__ . '\\Internet';
        \pear2\Pyrus\Config::current()->cache_dir = '/tmp';
        $chan = \pear2\Pyrus\Config::current()->channelregistry['pear2.php.net'];
        $this->package = $chan->remotepackage[$options['package']];
        foreach ($chan->remotepackage[$options['package']] as $version => $release) {
            $this->releases[$version] = $release;
        }
    }
}
?>