<?php
/**
 * Created by IntelliJ IDEA.
 * User: Polandy
 * Date: 12.11.13
 * Time: 20:37
 * To change this template use File | Settings | File Templates.
 */

namespace model\generic;


class GenericNamedModel extends GenericModel
{

    public $name_de;
    public $name_en;


    /**
     * @param mixed $name_de
     */
    public function setNameDe($name_de)
    {
        $this->name_de = $name_de;
    }

    /**
     * @return mixed
     */
    public function getNameDe()
    {
        return $this->name_de;
    }

    /**
     * @param mixed $name_en
     */
    public function setNameEn($name_en)
    {
        $this->name_en = $name_en;
    }

    /**
     * @return mixed
     */
    public function getNameEn()
    {
        return $this->name_en;
    }

    public function getName()
    {
        switch(\Config::getInstance()->language)
        {
            case "en":
                return $this->getNameEn();
            case "de":
                return $this->getNameDe();
        }
    }
}