<?php
/**
 * Controller for categoryAdmin
 */

// add a new category
if( isset($_POST["action"]) && $_POST["action"] == "addCategory"){
    $newCategory = new \model\Category($_POST["name_de"], $_POST["name_en"]);
    $catService = \service\CategoryService::getInstance();
    $catService->addCategory($newCategory);
//    header("Location: ./index.php?pageId=100");
    \service\MsgService::getInstance()->renderSuccessMsg('category_admin_success');

}