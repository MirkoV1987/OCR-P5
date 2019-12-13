<?php

namespace Framework;

abstract class Model 
{

    private static $db;
    
    private static function setDb()
    {
            self::$db = new \PDO('mysql:host=localhost;dbname=dbblog;charset=utf8', 'root', '');
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
    }

    protected function getDb()
    {
        if(self::$db == null)
           self::setDb();
        return self::$db;
    }

}
