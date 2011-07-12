<?php
namespace Pyrus\SimpleChannelFrontend\ReleaseFileBrowser;

class FilteredIterator extends \RecursiveFilterIterator
{
    function accept()
    {
        return !($this->getInnerIterator()->getBasename() == '.xmlregistry');
    }
}