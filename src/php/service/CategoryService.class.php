<?php

namespace service;

class CategoryService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array with all categories
     */
    public function getAllCategories()
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM category;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS, "model\\Category");
    }

    /**
     * @param $category
     */
    public function addCategory($category)
    {
        $sql = "INSERT INTO category (name_de,name_en) VALUES (:name_de,:name_en)";
        $sth = $this->getDBH()->prepare($sql);
        $sth->execute(array(
                ':name_de' => $category->getNameDe(),
                ':name_en' => $category->getNameEn())
        );
        $category->setId($this->getDBH()->lastInsertId());
    }

}