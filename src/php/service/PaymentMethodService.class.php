<?php

namespace service;

/**
 * Class PaymentMethodService
 * @package service
 * Service layer for PaymentMethod
 */
class PaymentMethodService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the PaymentMethodService
     */
    public static function getInstance()
    {
        if (is_null(static::$instance) || !static::$instance instanceof PaymentMethodService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return an array with all PaymentMethod Objects
     */
    public function getAllPaymentMethods()
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM paymentmethod ORDER by id DESC;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\PaymentMethod");
    }

    /**
     * @param $id
     * @return a single paymentmethod found by the given id
     */
    public function findPaymentMethodById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM paymentmethod WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\PaymentMethod");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }
}