<?php

namespace model;

/**
 * Class Furniture
 * @package model
 * represents the Furniture table in the database
 */
class Furniture extends generic\GenericNamedModel {

    public $basicPrice;
    public $description_de;
    public $description_en;
    public $category;
    public $img_url;

    function __construct($name_de = NULL, $name_en = NULL, $basicPrice = NULL, $category = NULL, $description_de = NULL, $description_en = NULL, $img_url = NULL)
    {
        $this->name_de = $name_de;
        $this->name_en = $name_en;
        $this->basicPrice = $basicPrice;
        $this->category = $category;
        $this->description_de = $description_de;
        $this->description_en = $description_en;
        $this->img_url = $img_url;
    }

    /**
     * @param null $basicPrice
     */
    public function setBasicPrice($basicPrice)
    {
        $this->basicPrice = $basicPrice;
    }

    /**
     * @return null
     */
    public function getBasicPrice()
    {
        return $this->basicPrice;
    }

    /**
     * @param null $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param null $description_de
     */
    public function setDescriptionDe($description_de)
    {
        $this->description_de = $description_de;
    }

    /**
     * @return null
     */
    public function getDescriptionDe()
    {
        return $this->description_de;
    }

    /**
     * @param null $description_en
     */
    public function setDescriptionEn($description_en)
    {
        $this->description_en = $description_en;
    }

    /**
     * @return null
     */
    public function getDescriptionEn()
    {
        return $this->description_en;
    }

    /**
     * @param null $img_url
     */
    public function setImgUrl($img_url)
    {
        $this->img_url = $img_url;
    }

    /**
     * @return null
     */
    public function getImgUrl()
    {
        return $this->img_url;
    }






}