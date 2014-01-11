<?php

namespace service;

/**
 * Class FurnitureService
 * @package service
 * Service Layer for Furniture
 */
class FurnitureService extends AbstractService
{

    protected function __construct()
    {
        parent::__construct();
    }

    /**
     * @return instance of the FurnitureService
     */
    public static function getInstance() {
        if (is_null(static::$instance) || !static::$instance instanceof FurnitureService) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     *
     * @param $category as object
     * @return a list of all furnitures of the given category, if category is invalid null is returned
     */
    public function findFurnitureByCategory($category) {
        if ($category == null) {
            return null;
        }
        $sql = "SELECT * FROM Furniture WHERE CategoryId = :category;";
        $sth = $this->getDBH()->prepare($sql);
        $sth->bindValue(':category', $category->getId());
        $sth->execute();
        return $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Furniture");

    }

    /**
     * Creates a Furniture in the database based on the given object
     * @param $furniture furniture object
     */
    public function addFurniture($furniture)
    {
        $sql = "INSERT INTO furniture (basicPrice, description_de, description_en, name_de, name_en, categoryId)
                VALUES (:price, :desc_de, :desc_en, :name_de, :name_en, :category)";
        $sth = $this->getDBH()->prepare($sql);
        $sth->execute(array(
                ':price' => $furniture->getBasicPrice(),
                ':desc_de' => $furniture->getDescriptionDe(),
                ':desc_en' => $furniture->getDescriptionEn(),
                ':name_de' => $furniture->getNameDe(),
                ':name_en' => $furniture->getNameEn(),
                ':category' => $furniture->getCategory()->getId())
        );
    }

}