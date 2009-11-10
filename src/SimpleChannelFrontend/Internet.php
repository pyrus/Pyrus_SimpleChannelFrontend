<?php
/**
 * Simulate the Internet
 */
namespace pear2\SimpleChannelFrontend;
class Internet extends \pear2\HTTP\Request
{

    /**
     * sets up the adapter
     */
    public function __construct($url = null) 
    {
        $this->adapter = new \pear2\HTTP\Request\Adapter\Filesystem($this);
        if ($url) {
            $this->url = $url;
        }
    }

    static function addDirectory($dir, $urlbase)
    {
        \pear2\HTTP\Request\Adapter\Filesystem::addDirectory($dir, $urlbase);
    }
}