<?php

namespace service;

/**
 * Class UserService
 * @package service
 * Service layer for User
 */
class UserService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the UserService
     */
    public static function getInstance() {
        if (is_null(static::$instance) || !static::$instance instanceof UserService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return an array with all user Objects
     */
    public function getAllUsers()
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM user;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\User");
    }

    /**
     * @param $id
     * @return a single user found by the given id
     */
    public function findUserById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM user WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\User");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     * @param $name
     * @return a single user found by the given name
     */
    public function findUserByName($name)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM user WHERE username = :name;");
        $sth->bindParam(':name', $name);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\User");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }
}