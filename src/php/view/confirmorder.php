<?php
global $tpl;


$config = Config::getInstance();
$user = $config->getUser();
if ($user == null)
    header("Location: index.php?pageId=403");

$orderService = \service\OrderService::getInstance();
$order = $orderService->findOrCreateOpenedOrder($user);


// Order has been confirmed
if (isset($_POST["orderNow"])) {
}


$order = $orderService->findOrCreateOpenedOrder($user);
$tpl->assign("user", $user);
$tpl->assign("order", $order);
$tpl->assign("totalprice", $furnitureService);
$tpl->assign("totalPrice", $orderService->getTotalOrderPrice($order));
$tpl->assign("orderFurnitures", $orderService->findAllOrderFurnitures($order));

