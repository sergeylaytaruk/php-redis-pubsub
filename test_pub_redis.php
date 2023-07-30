<?php

use Components\PubSubRedis;

require_once __DIR__ . '/vendor/autoload.php';
//composer require predis/predis
//composer require superbalist/php-pubsub
//composer require superbalist/php-pubsub-redis
var_dump("RUN=");
try {
    (new PubSubRedis())->pub('my_channel', ['hello' => 'world']);
} catch (\Throwable $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getLine());
    var_dump($ex->getFile());
}
