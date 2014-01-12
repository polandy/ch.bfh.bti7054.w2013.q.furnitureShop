<?php

namespace service;

/**
 * Class RoleService
 * @package service
 * Service layer for Role
 */
class RoleService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the RoleService
     */
    public static function getInstance() {
        if (is_null(static::$instance) || !static::$instance instanceof RoleService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return an array with all Role Objects
     */
    public function getAllRoles()
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM role;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Role");
    }

    /**
     * @param $id
     * @return a single role found by the given id
     */
    public function findRoleById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM role WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Role");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }
}