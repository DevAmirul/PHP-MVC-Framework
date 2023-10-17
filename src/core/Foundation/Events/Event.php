<?php

namespace Devamirul\PhpMicro\core\Foundation\Events;

use Devamirul\PhpMicro\core\Foundation\Application\Traits\Singleton;
use Exception;

class Event {
    use Singleton;

    private static $events = [];

    private function __construct() {}

    public static function listen(string $name, callable $callback) {
        self::$events[$name] = $callback;
    }

    public static function trigger(string $name, mixed $argument = null) {

        if (isset(self::$events[$name])) {

            $callback = self::$events[$name];

            if ($argument && !is_array($argument)) {
                call_user_func($callback, $argument);
            }elseif($argument && is_array($argument)){
                call_user_func_array($callback, $argument);
            }else{
                call_user_func($callback);
            }

        }else{
            throw new Exception('event not trigger');
        }
        
    }
}
