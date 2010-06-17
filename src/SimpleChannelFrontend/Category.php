<?php
namespace PEAR2\SimpleChannelFrontend;
class Category implements \IteratorAggregate
{
    /**
     * @var \PEAR2\Pyrus\Channel\RemoteCategory
     */
    protected $_category;

    public function __construct($options = array())
    {
        $this->_category = $options['frontend']::$channel->remotecategories[$options['category']];
        $this->rewind();
    }

    public function __get($var)
    {
        return $this->_category->$var;
    }

    public function __call($method, $args)
    {
        return call_user_func_array(array($this->_category, $method), $args);
    }

    public function getIterator()
    {
        return $this->_category;
    }
}
