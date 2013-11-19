<?php
namespace service;

class DBService
{
    private static $instance;
    private $dbh;


    private function __construct() {
        $config = \Config::getInstance();
        $strDbLocation = 'mysql:dbname='.$config->database.';host='.$config->database_host;
        try {
            $this->dbh = new \PDO($strDbLocation, $config->database_user, $config->database_pw);
        } catch (\PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }


    /**
     * @return dbh
     */
    public function getDBH()
    {
        return $this->dbh;
    }

    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new DBService();
        return self::$instance;
    }
}
