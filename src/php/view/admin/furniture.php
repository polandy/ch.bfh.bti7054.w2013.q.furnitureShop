<?php

if (isset($_POST["action"]) && $_POST["action"] == "addFurniture") {
    if (isset($_POST["category"])) {
        $categoryId = $_POST["category"];
        $catService = \service\CategoryService::getInstance();
        $category = $catService->findCategoryById($categoryId);
        if ($category == null) {
            //TODO handle
        }
        if (isset($_POST["name_de"]) && isset($_POST["name_en"]) && isset($_POST["price"]) &&
            isset($_POST["desc_de"]) && isset($_POST["desc_en"])
        ) {
            $furniture = new \model\Furniture($_POST["name_de"], $_POST["name_en"], $_POST["price"], $category, $_POST["desc_de"], $_POST["desc_en"]);
            $furnitureService = \service\FurnitureService::getInstance();
            $furnitureService->addFurniture($furniture);
        } else {
            // not all required vals are set!
        }


    }
//    $catService->addCategory($newCategory);
}