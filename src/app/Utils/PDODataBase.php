<?php


namespace App\Utils;

define('SQL_HOST', 'mariadb');
define('SQL_USER', 'root');
define('SQL_PWD', 'root');
define('SQL_DB', 'cmc_db');

use PDO;

class PDODataBase
{
    private static $instance = null;
    public $db;

    public function __construct()
    {
        /* connect to DB */
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DB, SQL_USER, SQL_PWD);
        } catch (\Exception $e) {
            die('DB error: ' . $e->getMessage() . "\n");
        }
    }

    public static function getInstance(){

        self::$instance= new PDODataBase();
        return self::$instance;
    }







}
