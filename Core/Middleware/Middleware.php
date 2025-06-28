<?php 

namespace Core\Middleware;
class Middleware
{
    public const MAP = [
        'guest' => \Core\Middleware\Guest::class,
        'auth' => \Core\Middleware\Auth::class,
    ];

    public static function resolve(string $key)
    {
        if (!$key) {
            return null;
        }

        $middleware = self::MAP[$key] ?? false;

        if (!isset(self::MAP[$key])) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}
