<?php

namespace service;

/**
 * Class CategoryService
 * @package service
 * Service layer for Category
 */
class CategoryService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return an instance of the CategoryService
     */
    public static function getInstance() {
        if (is_null(static::$instance) || !static::$instance instanceof CategoryService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @return an array with all category Objects
     */
    public function getAllCategories()
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM category;");
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Category");
    }

    /**
     * @param $id
     * @return a single category found by the given id
     */
    public function findCategoryById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM category WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Category");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     * creates the given category object in the database
     * @param $category object
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