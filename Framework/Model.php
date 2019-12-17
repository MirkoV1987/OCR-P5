<?php

namespace Framework;

abstract class Model 
{
    private static $database;
    
    private static function setDb()
    {
     self::$database = new \PDO('mysql:host=localhost;dbname=dbblog;charset=utf8', 'root', '');
     self::$database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
    }

    protected function getDb()
    {
     if(self::$database == null)
        self::setDb();
     return self::$database;
    }

}
