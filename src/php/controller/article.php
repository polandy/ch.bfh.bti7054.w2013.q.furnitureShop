<?php
/**
 * Controller for the article page
 */
// load the TemplateEngine Object
global $tpl;

// get pageId for the article defined in the config
$articlePageId = Config::getInstance()->getPageIdByValue('article');
$furniture = null;

// services
$msgService = \service\MsgService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();
$orderService = \service\OrderService::getInstance();

//get furniture based on the param, if funriture can't be found the user will be redirected to the page not found site
if (isset($_GET["pageId"]) && $_GET["pageId"] == $articlePageId && isset($_GET["f"])) {
    $furnitureId = $_GET["f"];
    $furniture = $furnitureService->findFurnitureById($furnitureId);
} else {
    header("Location: ./index.php?pageId=404");
}

// handle add to Cart action
$action = isset($_POST['action']) ? $_POST['action'] : null;
if ($action == 'addToCart') {
    if (!isset(Config::getInstance()->user)) {
        header("Location: ./index.php?pageId=99");
    }
    $feature = isset($_POST['featureId']) ? $_POST['featureId'] : null;
    $furniture = isset($_POST['f']) ? $_POST['f'] : null;

    $feature = $furnitureService->findFeatureById($feature);
    $furniture = $furnitureService->findFurnitureById($furniture);

    $orderService->addToOrder($furniture, $feature);
    // redirect to showCart site
    header("Location: ./index.php?pageId=5");
}

// assign variables for usage in view
$tpl->assign("name", $msgService->getName($furniture));
$tpl->assign("desc", $msgService->getDescription($furniture));
$tpl->assign("furnitureId", isset($furniture) ? $furniture->getId() : "");
$tpl->assign("addToCart", $msgService->getMsg('addToCart'));
$tpl->assign("features", $furnitureService->findFeaturesForFurniture($furniture));
$tpl->assign("furniture", $furniture);
