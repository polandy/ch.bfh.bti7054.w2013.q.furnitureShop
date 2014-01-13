<?php

namespace model;

/**
 * Class OrderFurniture
 * @package model
 * represents the order_furniture table in the database
 */
class OrderFurniture extends generic\GenericModel {

    /* Mapping Furniture Feature*/
    public $featureId;
    public $furnitureId;
    public $quantity;

}