<?php
global $tpl;


$articlePageId = Config::getInstance()->getPageIdByValue('article');
$furniture = null;
$msgService = \service\MsgService::getInstance();
if (isset($_GET["pageId"]) && $_GET["pageId"] == $articlePageId && isset($_GET["f"])) {
    $furnitureService = \service\FurnitureService::getInstance();
    $furnitureId = $_GET["f"];
    $furniture = $furnitureService->findFurnitureById($furnitureId);
} else {
    // TODO invalid URL
}

$tpl->assign("name", $msgService->getName($furniture));
$tpl->assign("desc", $msgService->getDescription($furniture));
$tpl->assign("furnitureId", isset($furniture) ? $furniture->getId() : "");
$tpl->assign("addToChart", $msgService->getMsg('addToChart'));
