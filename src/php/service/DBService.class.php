<?php
namespace service;

class DBService
{
    private static $instance;
    private $dbh;


    private function __construct() {
        $strDbLocation = 'mysql:dbname=furniturus;host=127.0.0.1';
        $strDbUser = 'root';
        $strDbPassword = '';
        try {
            $this->dbh = new PDO($strDbLocation, $strDbUser, $strDbPassword);
        } catch (PDOException $e) {
            echo 'Datenbank-Fehler: ' . $e->getMessage();
        }
    }


    /**
     * @return dbh
     */
    public static function getDBH()
    {
        return self::$dbh;
    }

    public static  function getInstance()
    {
        if (!is_null(self::$instance)) {
            $instance = new DBService();
        }
    }
}
