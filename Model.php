<?php

/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 11/12/17
 * Time: 18:14
 */

namespace MirkoV1987\Framework 

abstract class Model
{

 // private static $db;

   // private static function getDB()
      
        protected function connect()
        {
             new \PDO('mysql:host=localhost;dbname=blogdb;charset=utf8', 'root', '',
             array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }



        protected function executeRequest($sql, $params == null)
        {




            
        }















} 