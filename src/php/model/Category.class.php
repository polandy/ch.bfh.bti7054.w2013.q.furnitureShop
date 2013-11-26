<?php

namespace model;

class Category extends generic\GenericNamedModel {

    function __construct($name_de, $name_en)
    {
        $this->name_de = $name_de;
        $this->name_en = $name_en;
    }
}