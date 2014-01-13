<?php
global $tpl;


$articlePageId = Config::getInstance()->getPageIdByValue('article');
$furniture = null;
// services
$msgService = \service\MsgService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();
$orderService = \service\OrderService::getInstance();

//get furniture based on the param
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

    header("Location: ./index.php?pageId=5");
}

$tpl->assign("name", $msgService->getName($furniture));
$tpl->assign("desc", $msgService->getDescription($furniture));
$tpl->assign("furnitureId", isset($furniture) ? $furniture->getId() : "");
$tpl->assign("addToCart", $msgService->getMsg('addToCart'));
$tpl->assign("features", $furnitureService->findFeaturesForFurniture($furniture));
$tpl->assign("furniture", $furniture);
