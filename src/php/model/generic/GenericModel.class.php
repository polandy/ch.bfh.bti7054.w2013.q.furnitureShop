<?php
/**
 * Created by IntelliJ IDEA.
 * User: Polandy
 * Date: 12.11.13
 * Time: 20:37
 * To change this template use File | Settings | File Templates.
 */

namespace model\generic;


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