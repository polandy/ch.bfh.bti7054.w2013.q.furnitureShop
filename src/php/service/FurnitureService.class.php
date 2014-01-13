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
     *
     * @param $id of the feature
     * @return feature with given id
     */
    public function findFeatureById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM Feature WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Feature");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     *
     * @param $id of the furniture
     * @return furniture with given id
     */
    public function findFurnitureById($id)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM Furniture WHERE id = :id;");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Furniture");
        if (sizeof($list) > 0) {
            return $list[0];
        }
        return null;
    }

    /**
     *
     * @param $text as search text
     * @return furnitures that match
     */
    public function search($text)
    {
        $sth = $this->getDBH()->prepare("SELECT * FROM Furniture WHERE description_de LIKE :text OR description_en LIKE :text OR name_de LIKE :text OR name_en LIKE :text;");
        $sth->bindValue(':text', "%$text%");
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Furniture");
        return $list;
    }

    /**
     *
     * @param $furniture object
     * @return all available features for the given furniture object
     */
    public function findFeaturesForFurniture($furniture) {
        $sth = $this->getDBH()->prepare("SELECT * FROM Feature WHERE furnitureId = :furnitureId;");
        $sth->bindValue(':furnitureId', $furniture->getId());
        $sth->execute();
        $list = $sth->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, "model\\Feature");
        return $list;
    }

    /**
     * Creates a Furniture in the database based on the given object
     * @param $furniture furniture object
     */
    public function addFurniture($furniture)
    {
        $sql = "INSERT INTO furniture (basicPrice, description_de, description_en, name_de, name_en, img_url, categoryId)
                VALUES (:price, :desc_de, :desc_en, :name_de, :name_en, :img_url, :category)";
        $sth = $this->getDBH()->prepare($sql);
        $sth->execute(array(
                ':price' => $furniture->getBasicPrice(),
                ':desc_de' => htmlentities($furniture->getDescriptionDe()),
                ':desc_en' => htmlentities($furniture->getDescriptionEn()),
                ':name_de' => htmlentities($furniture->getNameDe()),
                ':name_en' => htmlentities($furniture->getNameEn()),
                ':img_url' => $furniture->getImgUrl(),
                ':category' => $furniture->getCategory()->getId())
        );
    }

    /**
     * adds the given feature for the given furniture
     * @param $feature
     * @internal param $furniture
     */
    public function addFeatureForFurniture($feature)
    {
        $sql = "REPLACE INTO feature (id, extraPrice, name_de, name_en, furnitureId)
                VALUES (:id, :extraPrice, :name_de, :name_en, :furnitureId)";
        $sth = $this->getDBH()->prepare($sql);
        $sth->execute(array(
                'id' => $feature->getId(),
                'extraPrice' => $feature->getExtraPrice(),
                'name_de' => htmlentities($feature->getNameDe()),
                'name_en' => htmlentities($feature->getNameEn()),
                'furnitureId' => $feature->getFurnitureId())
        );
    }



    /**
     * @param $furniture object you want to update with all given update parameters
     */
    public function updateFurniture($furniture) {
        if (isset($furniture) && isset($furniture->id)) {
            $sql = "UPDATE Furniture SET basicPrice = :price, description_de = :desc_de, description_en = :desc_en, name_de = :name_de, name_en = :name_en, img_url = :img_url, categoryId = :category WHERE id = :id";
            $sth = $this->getDBH()->prepare($sql);
            $sth->execute(array(
                    'price' => $furniture->getBasicPrice(),
                    'desc_de' => $furniture->getDescriptionDe(),
                    'desc_en' => $furniture->getDescriptionEn(),
                    'name_de' => $furniture->getNameDe(),
                    'name_en' => $furniture->getNameEn(),
                    'img_url' => $furniture->getImgUrl(),
                    'category' => $furniture->getCategory()->getId(),
                    'id' => $furniture->getId()
            ));
        }
        else {
            header("Location: ./index.php?pageId=403");

        }
    }

}