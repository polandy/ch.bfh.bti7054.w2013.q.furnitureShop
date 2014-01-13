<?php

namespace model;

/**
 * Class Order
 * @package model
 * represents the Order table in the database
 */
class Order extends generic\GenericModel
{

    /* Mapping Furniture Feature*/
    public $user;
    public $isOpen;
    public $orderDate;

}