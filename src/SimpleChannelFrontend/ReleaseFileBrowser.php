<?php
namespace PEAR2\SimpleChannelFrontend;
class ReleaseFileBrowser
{
    public $options;

    public $release;

    public $internal_file;

    function __construct($options = array())
    {
        $file = Main::$channel_path.'/get/'.$options['release'];
        if (!file_exists($file)
            || dirname($file) != Main::$channel_path.'/get') {
            throw new \Exception('Cannot find the package. '.$file);
        }

        $this->release = new \PharData($file);

        if (isset($options['internal'])) {
            $file = 'phar://'.$file.'/'.$options['internal'];
            if (file_exists($file)) {
                $this->internal_file = new \SplFileObject($file);
            }
        }

        $this->options = $options;

    }

}