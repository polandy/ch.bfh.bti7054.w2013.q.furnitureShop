<?php

if( isset($_POST["action"]) && $_POST["action"] == "addCategory"){
    $newCategory = new \model\Category($_POST["name_de"], $_POST["name_en"]);
    $catService = \service\CategoryService::getInstance();
    $catService->addCategory($newCategory);
}