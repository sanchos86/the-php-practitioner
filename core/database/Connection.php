<?php

class Connection {
    public static function make($config): PDO {
        try {
            $dsn = $config['driver'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['dbname'];
            return new PDO($dsn, $config['user'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
