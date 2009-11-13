<?php
namespace pear2\SimpleChannelFrontend;
class Categories
{
    public $categories;
    
    function __construct($options = array())
    {
        $this->categories = $options['frontend']::$channel->remotecategories;
    }
}