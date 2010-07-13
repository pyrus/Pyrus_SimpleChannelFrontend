<?php
namespace PEAR2\SimpleChannelFrontend\ReleaseFileBrowser;

class FilteredIterator extends \RecursiveFilterIterator
{
    function __construct($iterator)
    {
        parent::__construct($iterator);
    }

    function accept()
    {
        return !($this->getInnerIterator()->getBasename() == '.xmlregistry');
    }
}