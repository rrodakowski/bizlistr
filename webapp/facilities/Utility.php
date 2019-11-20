<?php

class Utility
{
    private static $db = 'localhost';
    private static $initialized = false;

    // Working Locally
    private static $url = '/bizlistr';
    private static $user = 'root';
    private static $pw = 'root';

    // Deployed on the external server
    /*private static $url = '';
    private static $user = 'randall';
    private static $pw = 'nickPunto';*/
    

    private static function initialize()
    {
        if (self::$initialized)
                return;

        //self::$url .= ' There!';
        self::$initialized = true;
    }

    public static function getUrl()
    {
        self::initialize();
        return self::$url;
    }

    public static function getUser()
    {
        self::initialize();
        return self::$user;
    }

    public static function getPw()
    {
        self::initialize();
        return self::$pw;
    }

    public static function getDb()
    {
        self::initialize();
        return self::$db;
    }

    public static function separate($list, $delimiter)
    {
        self::initialize();
        $arrayOfWhatever = explode($delimiter, $list);

        return $arrayOfWhatever;
    }
}

?>