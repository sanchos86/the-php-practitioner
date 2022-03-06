<?php

namespace Core;

class App {
    private static array $dependencies = [];

    public static function bind($key, $value)
    {
        static::$dependencies[$key] = $value;
    }

    public static function get($key)
    {
        if (!array_key_exists($key, static::$dependencies)) {
            throw new Exception('Key not found');
        }

        return static::$dependencies[$key];
    }
}
