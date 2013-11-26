<?php

namespace model;

class Category extends generic\GenericNamedModel
{

    public function __construct($name_de = NULL, $name_en = NULL)
    {
        if ($name_de)
            $this->name_de = $name_de;
        if ($name_en)
            $this->name_en = $name_en;
    }
}