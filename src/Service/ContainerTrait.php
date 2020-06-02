<?php


namespace Budget\Service;


use Pimple\Container;

trait ContainerTrait
{
    /**
     * @var Container
     */
    private $container;

    public function getContainer()
    {
        return $this->container;
    }

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }
}