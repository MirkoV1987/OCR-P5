<?php

namespace Framework;

abstract class Model
{
    private static $database;
    
    private static function setDb()
    {
        $dsn = Configuration::get("dsn");
        $login = Configuration::get("login");
        $password = Configuration::get("password");

        self::$database = new \PDO($dsn, $login, $password);
        self::$database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
    }

    protected function getDb()
    {
        if (self::$database == null) {
            self::setDb();
        }
        return self::$database;
    }
}
