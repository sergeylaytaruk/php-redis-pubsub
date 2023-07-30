<?php

namespace Components;

use Predis\Client;
use Superbalist\PubSub\Redis;
use Superbalist\PubSub\Redis\RedisPubSubAdapter;

class PubSubRedis
{
    private $redisClient;
    public function __construct()
    {
        $this->redisClient = new Client([
            'scheme' => 'tcp',
            'host' => 'redis',
            'port' => 6379,
            'database' => 0,
            'read_write_timeout' => 0
        ]);
    }
    public function pub($chanel, $message)
    {
        $adapter = new RedisPubSubAdapter($this->redisClient);
        $adapter->publish($chanel, $message);
    }

    public function sub($chanel)
    {
        $adapter = new RedisPubSubAdapter($this->redisClient);
        $adapter->subscribe($chanel, function ($message) {
            var_dump("CATCH MESSAGE redis chanel=");
            var_dump($message);
        });
    }
}
