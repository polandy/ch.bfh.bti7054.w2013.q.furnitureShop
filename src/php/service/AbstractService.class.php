<?php

namespace service;

abstract class AbstractService
{

    private $dbService;

    protected  static $instance;

    public static function getInstance() {
        if (is_null(self::$instance))
            self::$instance = new static();
        return self::$instance;
    }

    protected function __construct()
    {
        $this->dbService = \service\DBService::getInstance();
    }

    public function getDBH()
    {
        return $this->dbService->getDBH();
    }

}
