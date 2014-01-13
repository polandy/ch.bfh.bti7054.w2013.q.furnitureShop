<?php
/**
 * Created by IntelliJ IDEA.
 * User: Polandy
 * Date: 12.11.13
 * Time: 20:37
 * To change this template use File | Settings | File Templates.
 */

namespace model\generic;

/**
 * Class GenericModel
 * @package model\generic
 * This class is the super class of all model classes.
 * In this class the default attributes / columns are defined.
 * The attributes of all Models are public because this is necessary for the mappging from PDO to the object.
 */
class GenericModel {

    public $id;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}