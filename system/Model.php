<?php

namespace System;

use PDO;
use System\Config;

abstract class Model
{
    protected static $dbInstanace;
    protected  $db;

    public function __construct()
    {

        if (!self::$dbInstanace) {

            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
            self::$dbInstanace = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

            // Throw an Exception when an error occurs
            self::$dbInstanace->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        $this->db = self::$dbInstanace;
    }
}
