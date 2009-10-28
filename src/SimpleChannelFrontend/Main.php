<?php
/**
 * pear2\SimpleChannelFrontend\Main
 *
 * PHP version 5
 *
 * @category  Yourcategory
 * @package   PEAR2_SimpleChannelFrontend
 * @author    Your Name <handle@php.net>
 * @copyright 2009 Your Name
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version   SVN: $Id$
 * @link      http://svn.php.net/repository/pear2/PEAR2_SimpleChannelFrontend
 */

/**
 * Main class for PEAR2_SimpleChannelFrontend
 *
 * @category  Yourcategory
 * @package   PEAR2_SimpleChannelFrontend
 * @author    Your Name <handle@php.net>
 * @copyright 2009 Your Name
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      http://svn.php.net/repository/pear2/PEAR2_SimpleChannelFrontend
 */
namespace pear2\SimpleChannelFrontend;
class Main
{
    /**
     * The channel object
     * @var Channel
     */
    static public $channel;
    
    public $page_content;
    
    protected $options = array('view' => 'news');
    
    protected $view_map = array('news'     => 'News',
                                'packages' => 'PackageList',
                                'package'  => 'Package');
    
    function __construct(\pear2\Pyrus\IChannelFile $channel, $options = array())
    {        
        static::setChannel($channel);
        $this->options = array_merge($this->options, $options);
        $this->run();
    }
    
    public static function setChannel(\pear2\Pyrus\IChannelFile $channel)
    {
        \pear2\Pyrus\Main::$downloadClass = __NAMESPACE__ . '\\Internet';
        \pear2\Pyrus\Config::current()->cache_dir = '/tmp';
        
        static::$channel = \pear2\Pyrus\Config::current()->channelregistry['pear2.php.net'];
        $base_directory = dirname($channel->path);
        
        $rest = str_replace('http://' . $channel->name,
                            '',
                            $channel->protocols->rest['REST1.0']->baseurl);
        
        Internet::addDirectory($base_directory . '/get',
                               'http://' . $channel->name . '/get/');
        Internet::addDirectory($base_directory . $rest,
                               $channel->protocols->rest['REST1.0']->baseurl);
        
        static::$channel->fromArray($channel->getArray());
    }
    
    function run()
    {
        if (!array_key_exists($this->options['view'], $this->view_map)) {
            throw new Exception('No view, or incorrect view specified.');
        }
        $class = __NAMESPACE__.'\\'.$this->view_map[$this->options['view']];
        $options = array_merge($this->options, array('frontend'=>$this));
        $this->page_content = new $class($options);
    }
}
