<?php
/**
 * Controller for sidebar
 */
$category = null;

$tpl->assign("catFurnitures", array());

// if an article is selected, the articles from the same category must be displayed
if (isset($_GET['f'])) {
    $furniture = \service\FurnitureService::getInstance()->findFurnitureById($_GET['f']);
    if ($furniture != null) {
        $category = \service\CategoryService::getInstance()->findCategoryById($furniture->categoryId);
    }
}

// Get category by catId parameter
if ($category == null && isset($_GET["catId"])) {
    $id = $_GET["catId"];
    $category = \service\CategoryService::getInstance()->findCategoryById($id);
}

if ($category != null) {
    $msgService = \service\MsgService::getInstance();

    $furnitures = \service\FurnitureService::getInstance()->findFurnitureByCategory($category);
    $tpl->assign("catFurnitures",$furnitures);
}