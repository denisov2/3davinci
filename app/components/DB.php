<?php

namespace app\components;

/**
 * Created by PhpStorm.
 * User: denisov
 * Date: 06.05.2018
 * Time: 20:30
 */

use PDO;

class DB
{
  
    /* @var  $connection PDO */
    public static $connection = null;

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        if (null === self::$connection)
        {

            $host = getenv('DB_HOST');
            $db   = getenv('DB_BASE');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $charset = 'utf8';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            self::$connection = new PDO($dsn, $user, $pass, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }
        return self::$connection;
    }
    private function __clone() {}
    private function __construct() {
    }

}

