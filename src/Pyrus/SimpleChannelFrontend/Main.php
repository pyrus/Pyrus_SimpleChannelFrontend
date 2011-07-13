<?php

/**
 * \Pyrus\SimpleChannelFrontend\Main
 *
 * PHP version 5
 *
 * @category  PEAR2
 * @package   Pyrus_SimpleChannelFrontend
 * @author    Brett Bieber <saltybeagle@php.net>
 * @author    Michael Gauthier <mike@silverorange.com>
 * @copyright 2009 Brett Bieber, 2011 Michael Gauthier
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      http://pear2.php.net/Pyrus_SimpleChannelFrontend
 */

/**
 * Main class for \Pyrus\SimpleChannelFrontend
 *
 * @category  PEAR2
 * @package   Pyrus_SimpleChannelFrontend
 * @author    Brett Bieber <saltybeagle@php.net>
 * @author    Michael Gauthier <mike@silverorange.com>
 * @copyright 2009 Brett Bieber, 2011 Michael Gauthier
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      http://pear2.php.net/Pyrus_SimpleChannelFrontend
 */
namespace Pyrus\SimpleChannelFrontend;
class Main implements \PEAR2\Templates\Savant\Turbo\CacheableInterface
{
    /**
     * The title of the current page
     *
     * @var string
     */
    public $page_title = '{page_title}';

    /**
     * The content of the current page
     *
     * @var string
     */
    public $page_content;

    /**
     * Options passed to the view
     *
     * @var array
     */
    public $options = array(
        'view'   => 'news',
        'format' => 'html',
    );

    /**
     * Application title
     *
     * @var string
     */
    public $title = 'Simple Channel Frontend';

    /**
     * The channel object
     *
     * @var \Pyrus\ChannelInterface
     *
     * @see \Pyrus\SimpleChannelFrontend::setChannel()
     * @see \Pyrus\SimpleChannelFrontend::getChannel()
     */
    protected $channel;

    /**
     * The channel path
     *
     * @var string
     *
     * @see \Pyrus\SimpleChannelFrontend::setChannel()
     * @see \Pyrus\SimpleChannelFrontend::getChannelPath()
     */
    protected $channel_path;

    /**
     * Map of view routes to view classes
     *
     * @var array
     *
     * @see \Pyrus\SimpleChannelFrontend::registerView()
     */
    protected $view_map = array(
        'news'        => 'Pyrus\SimpleChannelFrontend\News',
        'packages'    => 'Pyrus\SimpleChannelFrontend\PackageList',
        'package'     => 'Pyrus\SimpleChannelFrontend\Package',
        'release'     => 'Pyrus\SimpleChannelFrontend\PackageRelease',
        'latest'      => 'Pyrus\SimpleChannelFrontend\LatestReleases',
        'categories'  => 'Pyrus\SimpleChannelFrontend\Categories',
        'category'    => 'Pyrus\SimpleChannelFrontend\Category',
        'support'     => 'Pyrus\SimpleChannelFrontend\Support',
        'search'      => 'Pyrus\SimpleChannelFrontend\Search',
        'filebrowser' => 'Pyrus\SimpleChannelFrontend\ReleaseFileBrowser',
    );

    /**
     * The base URL of the frontend
     *
     * @var string
     *
     * @see \Pyrus\SimpleChannelFrontend::getURL()
     */
    protected $url_base = '';

    /**
     * Creates a new simple channel frontend
     *
     * @param \Pyrus\ChannelFile $channel the channel object.
     * @param array                    $options an associative array of options.
     */
    public function __construct(
        \Pyrus\ChannelFileInterface $channel,
        $options = array()
    ) {
        $this->setChannel($channel);
        $this->options = $options + $this->options;
    }

    /**
     * Registers a new view for the channel
     *
     * @param string $route     the route used to identify this model and view.
     * @param string $classname the class to instantiate when the specified
     *                          view is requested.
     *
     * @return \Pyrus\SimpleChannelFrontend\Main the current class for fluent
     *                                           interface.
     */
    public function registerView($route, $classname)
    {
        $this->view_map[$route] = $classname;
        return $this;
    }

    /**
     * Sets the channel file for this frontend
     *
     * @param \Pyrus\ChanelFileInterface $channel_file The channel object.
     *
     * @return \Pyrus\SimpleChannelFrontend\Main the current class for fluent
     *                                           interface.
     */
    public function setChannel(\Pyrus\ChannelFileInterface $channel_file)
    {
        $config = \Pyrus\Config::current();

        $channel = new \Pyrus\Channel($channel_file);

        // Ensure the channel currently exists in the registry
        if (!$config->channelregistry->exists($channel->name)) {
            $config->channelregistry->add($channel);
        }

        $this->channel      = $config->channelregistry[$channel->name];
        $this->channel_path = dirname($channel_file->path);

        if (strpos($channel_file->path, 'http://') !== false) {
            // This channel is remote, there won't be any local files to set up.
            return $this;
        }

        \Pyrus\Main::$downloadClass = __NAMESPACE__ . '\\Internet';

        $rest = str_replace(
            'http://' . $channel_file->name,
            '',
            $channel_file->protocols->rest['REST1.0']->baseurl
        );

        Internet::addDirectory(
            $this->channel_path . '/get',
            'http://' . $channel_file->name . '/get/'
        );

        Internet::addDirectory(
            $this->channel_path . $rest,
            $channel_file->protocols->rest['REST1.0']->baseurl
        );

        return $this;
    }

    /**
     * Gets this frontend's PEAR channel
     *
     * @return \Pyrus\ChannelInterface this frontend's PEAR channel.
     *
     * @return \Pyrus\SimpleChannelFrontend\Main the current class for fluent
     *                                           interface.
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Gets the path to this frontend's PEAR channel
     *
     * @return string the path to this frontend's channel
     *
     * @see \Pyrus\SimpleChannelFrontend\Main::setChannel()
     */
    public function getChannelPath()
    {
        return $this->channel_path;
    }

    public function getCacheKey()
    {
        return serialize($this->options);
    }

    /**
     * Sets appropriate HTTP headers before the page is rendered
     *
     * @return void
     */
    public function preRun($cached)
    {
        switch ($this->options['format']) {
        case 'rss':
            header('Content-type:text/xml');
            break;
        case 'html':
        default:
            header('Content-Type:text/html; charset=UTF-8');
            break;
        }
    }

    /**
     * Determines and instantiates the page class
     *
     * The instantiated page class is set as the page content.
     *
     * @return void
     */
    public function run()
    {
        try {
            if (!array_key_exists($this->options['view'], $this->view_map)) {
                throw new UnregisteredViewException(
                    'No view, or incorrect view specified.'
                );
            }

            $class = $this->view_map[$this->options['view']];
            $options = array_merge($this->options, array('frontend' => $this));
            $this->page_content = new $class($options);
        } catch(\Exception $e) {
            $this->page_content = $e;
        }
    }

    /**
     * Gets the URL for a view
     *
     * @param mixed $class optional. The class for which to return a route. If
     *                     not specified, the current URL is returned.
     *
     * @return string the URL.
     */
    public function getURL($class = null)
    {
        static $default_view;

        if (empty($default_view)) {
            $main         = new \ReflectionClass(__CLASS__);
            $properties   = $main->getDefaultProperties();
            $default_view = $properties['options']['view'];
        }

        $url = $this->url_base;
        if ($class) {
            if (is_object($class)) {
                $class = get_class($class);
            }
            $route = array_keys($this->view_map, $class);
            if (!count($route)) {
                throw new UnregisteredViewException(
                    'The view for that object is not registered.'
                );
            }

            if ($route[0] != $default_view) {
                $url .= '?view=' . $route[0];
            }

        }
        return $url;
    }

    /**
     * Sets the base URL for this frontend
     *
     * @param string $url the base url for this frontend.
     *
     * @return \Pyrus\SimpleChannelFrontend\Main the current class for fluent
     *                                           interface.
     */
    public function setURLBase($url)
    {
        $this->url_base = $url;
    }

    /**
     * Performs necessary replacements after the page is rendered
     *
     * @param string $html The rendered template.
     *
     * @return string Filtered html.
     */
    public function postRender($html)
    {
        return str_replace(
            '{page_title}',
            $this->page_title,
            $html
        );
    }
}
