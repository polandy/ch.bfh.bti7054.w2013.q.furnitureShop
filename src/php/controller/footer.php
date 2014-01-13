<?php
/**
 * Controller of confirmorder
 */

// Import TemplateEngine Object
global $tpl;

// services
$msgService = \service\MsgService::getInstance();

// assign variables for usage in view
$url = $_SERVER["REQUEST_URI"];
$tpl->assign("langURL", $url . (strpos($url, '?') !== false ? "&lang=" : "?lang="));
$tpl->assign("createCategory", $msgService->getMsg('footer_admin_createCategory'));
$tpl->assign("createFurniture", $msgService->getMsg('footer_admin_createFurniture'));
$tpl->assign("impressum", $msgService->getMsg('footer_impressum'));


