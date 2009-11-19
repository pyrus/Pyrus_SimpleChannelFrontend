<?php
namespace pear2\SimpleChannelFrontend;
class Package implements \ArrayAccess, \Iterator
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
    
    function offsetExists($offset)
    {
        return $this->_package->offsetExists($offset);
    }
    
    function offsetGet($offset)
    {
        return $this->_package->offsetGet($offset);
    }
    
    function offsetSet($offset, $val)
    {
        return $this->_package->offsetSet($offset, $val);
    }
    
    function offsetUnset($offset)
    {
        return $this->_package->offsetUnset($offset);
    }
    
    function current()
    {
        return $this->_package->current();
    }
    
    function next()
    {
        return $this->_package->next();
    }
    
    function key()
    {
        return $this->_package->key();
    }
    
    function valid()
    {
        return $this->_package->valid();
    }
    
    function rewind()
    {
        return $this->_package->rewind();
    }
}
