<?php
namespace pear2\SimpleChannelFrontend;
class PackageList extends \pear2\Pyrus\Channel\RemotePackages
{
    public $directory;
    
    public $packages = array();
    
    /**
     * Remote packages object
     * 
     * @var \pear2\Pyrus\Channel\RemotePackages
     */
    protected $_remotepackages;
    
    function __construct($options = array())
    {
        parent::__construct($options['frontend']::$channel);
    }
}
