<?php


namespace Budget\ServiceProvider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ConfigServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $configFile = $container['config_file'];

        if (!file_exists($configFile)) {
            throw new \Exception('File does not exists');
        }
        $config = parse_ini_file($configFile, true);
        $container['config'] = $config;
    }

}