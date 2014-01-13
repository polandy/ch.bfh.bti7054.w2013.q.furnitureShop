<?php

namespace service;

/**
 * Class AbstractService
 * @package service
 * AbstractService, this class is the superclass of all other service.
 * It provides the member $instance, because all services must be singletons.
 * Also the DBService is defined in this abstract class so all subclasses can use the DBService directly.
 */
abstract class AbstractService
{

    /**
     * @var DBService all must have the DBService as a member
     */
    private $dbService;

    /**
     * @var singleton object
     */
    protected  static $instance;

    /**
     * the constructor instantiate the dbservice
     */
    protected function __construct()
    {
        $this->dbService = \service\DBService::getInstance();
    }

    /**
     * @return instance of the DBService
     */
    public function getDBH()
    {
        return $this->dbService->getDBH();
    }

}
