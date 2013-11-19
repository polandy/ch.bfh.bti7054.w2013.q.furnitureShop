<?php

namespace service;

abstract class AbstractService {

    private $dbService;

   public function __construct() {
       $this->dbService = DBService::getInstance();
   }

    public function getDBH() {
        return $this->dbService->getDBH();
    }

}
