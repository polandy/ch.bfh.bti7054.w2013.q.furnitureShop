<?php

namespace service;
use model\Order;

/**
 * Class OrderService
 * @package service
 * Service layer for Order
 */
class OrderService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the OrderService
     */
    public static function getInstance()
    {
        if (is_null(static::$instance) || !static::$instance instanceof OrderService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     * @param $user
     * @return finds the opened cart. if there is none, a new one will be created
     */
    private function findOrCreateOpenedOrder($user)
    {
        $order = $this->findOrderByUser($user);
        if ($order == null) {
            $sth = $this->getDBH()->prepare("INSERT INTO Order (isOpen, userId) VALUES (1, :userId);");
            $sth->bindParam(':userId', $user->getId());
            $sth->execute();
        }
        return $this->findOrderByUser($user);
    }

    private function findOrderByUser($user)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM Order WHERE userId = :userId AND isOpen = 1;");
        $sth->bindParam(':userId', $user->getId());
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\User");
        if (sizeof($list) > 0) {
            return $list[0];
        }
    }


    /**
     * adds a furniture with an optional feature to the cart
     * @param $furniture
     * @param $feature
     */
    public function addToOrder($furniture, $feature)
    {
        // get opened cart or create a new one
        $order = $this->findOrderByUser(\Config::getInstance()->getUser());

        $sql = "INSERT INTO order_furniture (orderId, furnitureId, featureId) VALUES (:orderId, :furnitureId, :featureId)";
        $sth = $this->getDBH()->prepare($sql);
        $featureId = $feature == null ? null : $feature->getId();
        $sth->execute(array(
                'orderId' => $order->getId(),
                'furnitureId' => $furniture->getId(),
                'featureId' => $featureId)
        );
    }

}