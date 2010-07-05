<?php

namespace PEAR2\SimpleChannelFrontend;

class ReleaseFileBrowser
{
    public $options;

    public $release;

    public $internal_file;

    public function __construct($options = array())
    {
        $root = rtrim(Main::$channel_path, DIRECTORY_SEPARATOR);
        $root = $root . DIRECTORY_SEPARATOR . 'get';
        $file = $root . DIRECTORY_SEPARATOR . $options['release'];

        if (!file_exists($file) || dirname($file) != $root) {
            throw new \Exception('Cannot find the package ' . $file . '.');
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
