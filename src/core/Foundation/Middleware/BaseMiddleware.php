<?php

namespace Devamirul\PhpMicro\core\Foundation\Middleware;

class BaseMiddleware {

    public static function resolve($names) {

        if (!$names) return;

        if (is_string($names)) {
            $middleware = config('app', 'middleware')[$names] ?? null;

            if (!$middleware) throw new \Exception('No matching middleware found for key' . $names);

            (new $middleware())->handle();
        } else {
            foreach ($names as $name) {
                $middleware = config('app', 'middleware')[$name] ?? null;

                if (!$middleware) throw new \Exception('No matching middleware found for key' . $name);

                (new $middleware())->handle();
            }
        }
    }

}
