<?php 
namespace pear2\SimpleChannelFrontend;
use pear2\Pyrus\Channel;

class Search extends \FilterIterator
{
    public $query;

    function __construct($options = array())
    {
        
        if (isset($options['q'])) {
            $this->query = $options['q'];
        }

        parent::__construct(new \pear2\Pyrus\Channel\RemotePackages(Main::$channel));
    }

    function accept()
    {
        return (bool)stristr($this->current()->name, $this->query);
    }

}