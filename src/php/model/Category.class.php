<?php

namespace model;

/**
 * Class Category
 * @package model
 * represents the Category Table in the database
 */
class Category extends generic\GenericNamedModel
{

    public function __construct($name_de = NULL, $name_en = NULL)
    {
        $this->name_de = $name_de;
        $this->name_en = $name_en;
    }
}