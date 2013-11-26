<?php

namespace service;

abstract class AbstractService
{

    private $dbService;

    protected  static $instance;

    public abstract static function getInstance();

    protected function __construct()
    {
        $this->dbService = \service\DBService::getInstance();
    }

    public function getDBH()
    {
        return $this->dbService->getDBH();
    }

}
