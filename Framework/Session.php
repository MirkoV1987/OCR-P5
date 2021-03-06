<?php

namespace Framework;

class Session
{
    private static $session;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function getSession()
    {
        if (!self::$session) {
            self::$session = new Session();
        }

        return self::$session;
    }

    public function setKey($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getKey($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }
}
