<?php

namespace model;

/**
 * Class Feature
 * @package model
 * represents the Feature table in the database
 */
class Feature extends generic\GenericNamedModel {

    public $extraPrice;
    public $furnitureId;

    function __construct($extraPrice = null, $furnitureId = null, $name_de = NULL, $name_en = NULL)
    {
        $this->name_de = $name_de;
        $this->name_en = $name_en;
        $this->extraPrice = $extraPrice;
        $this->furnitureId = $furnitureId;
    }


    /**
     * @param mixed $extraPrice
     */
    public function setExtraPrice($extraPrice)
    {
        $this->extraPrice = $extraPrice;
    }

    /**
     * @return mixed
     */
    public function getExtraPrice()
    {
        return $this->extraPrice;
    }

    /**
     * @param mixed $furnitureId
     */
    public function setFurnitureId($furnitureId)
    {
        $this->furnitureId = $furnitureId;
    }

    /**
     * @return mixed
     */
    public function getFurnitureId()
    {
        return $this->furnitureId;
    }



}