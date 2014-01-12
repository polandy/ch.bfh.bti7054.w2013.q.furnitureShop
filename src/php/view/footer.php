<?php
global $tpl;

$msgService = \service\MsgService::getInstance();

$tpl->assign("createCategory", $msgService->getMsg('footer_admin_createCategory'));
$tpl->assign("createFurniture", $msgService->getMsg('footer_admin_createFurniture'));

$url = $_SERVER["REQUEST_URI"];

$tpl->assign("langURL", $url . (strpos($url, '?') !== false ? "&lang=" : "?lang="));