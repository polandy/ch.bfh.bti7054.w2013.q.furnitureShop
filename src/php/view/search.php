<?php
/**
 * Controller for search
 */
// AJAX search for a furniture, takes 'text' POST param as search text
require_once '../Autoloader.class.php';
new Autoloader();

// singletons
$config = Config::getInstance();
$furnitureService = \service\FurnitureService::getInstance();
$msgService = \service\MsgService::getInstance();

// Search the furniture
$furnitures = $furnitureService->search($_POST["text"]);

// Display the results
if (sizeof($furnitures) == 0) {
    echo $msgService->getMsg('search_noSearchResult');
} else {
    echo "<ul>";
    foreach ($furnitures as $furniture) {
        echo "<li><a href='./index.php?pageId=3&f=" . $furniture->id . "'>" . $furniture->getName() . "</a></li>";
    }
    echo "</ul>";
}