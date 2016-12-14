<?php

/**
 * Created by PhpStorm.
 * User: SakuraKeit
 * Date: 08.12.2016
 * Time: 6:01
 */
class Database
{

    private $_db;
    static $_instance;

    private function __construct()
    {
        $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true
        );
        try {
            $this->_db = new PDO($dsn, DB_USER, DB_PASS, $opt
            );
            $this->_db->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
    }
    protected function __clone()
    {
        throw new Exception("Can't clone a singleton");
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function query($sql)
    {
        return query($this->_db, $sql);
    }

    public function prepare($sql)
    {
        return $this->_db->prepare($sql);

    }
}
