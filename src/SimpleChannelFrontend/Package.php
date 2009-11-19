<?php
namespace pear2\SimpleChannelFrontend;
class Package implements \IteratorAggregate
{
    public $_package;
    
    function __construct($options = array())
    {
        $this->_package = $options['frontend']::$channel->remotepackage[$options['package']];
    }
    
    function __get($var)
    {
        return $this->_package->$var;
    }
    
    function __call($method, $args)
    {
        return call_user_func_array(array($this->_package, $method), $args);
    }
    
    function getIterator()
    {
        return $this->_package;
    }
}
