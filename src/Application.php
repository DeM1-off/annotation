<?php

namespace Budget;

use Budget\ServiceProvider\AnnotationReaderServiceProvider;
use Budget\ServiceProvider\ConfigServiceProvider;
use Budget\ServiceProvider\DbServiceProvider;
use Pimple\Container;

class Application
{
    /** @var Container  */
    private $container;

    public function __construct()
    {
        $this->container = new Container();
        $this->container['config_file'] = __DIR__ . '/../config/setting.ini';

        $this->initProviders();
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    private function initProviders()
    {
        $this->container->register(new AnnotationReaderServiceProvider());
        $this->container->register(new ConfigServiceProvider());
        $this->container->register(new DbServiceProvider());
    }

}