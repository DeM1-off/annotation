<?php


namespace Budget\ServiceProvider;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DbServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $config = $container['config']['db'];
        try {
            $uri = sprintf('mysql:dbname=%s;host=%s',
                $config['db_name'], $config['host']
            );
            $pdo = new \PDO($uri, $config['user'], $config['pass']);
            $container['db'] = $pdo;
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }

}