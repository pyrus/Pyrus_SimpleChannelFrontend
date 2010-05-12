<?php 
namespace PEAR2\SimpleChannelFrontend;
use PEAR2\Pyrus\Channel;

class Search extends \FilterIterator
{
    public $query;

    function __construct($options = array())
    {
        
        if (isset($options['q'])) {
            $this->query = $options['q'];
        }

        parent::__construct(new \PEAR2\Pyrus\Channel\RemotePackages(Main::$channel));
    }

    function accept()
    {
        return (bool)stristr($this->current()->name, $this->query);
    }

}