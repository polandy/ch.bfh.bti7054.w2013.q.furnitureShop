<?php
namespace service;

/**
 * Class DBService
 * @package service
 * The DBService encapsules the DBConnection.
 * This Service is available in all others Services which extends the AbstractService.
 * For the database connection, transactions the PDO interface is used.
 */
class DBService
{
    # singleton instance
    private static $instance;
    private $dbh;

    /**
      * establish the db connection
      */
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
     * @return dbh as the connection between PHP and mysql
     */
    public function getDBH()
    {
        return $this->dbh;
    }

    /**
     * @return DBService instance
     */
    public static function getInstance()
    {
        if (is_null(self::$instance))
            self::$instance = new DBService();
        return self::$instance;
    }
}
