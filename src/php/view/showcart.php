<?php
global $tpl;


$config = Config::getInstance();
$user = $config->getUser();
if ($user == null)
    header("Location: index.php?pageId=403");

$orderService = \service\OrderService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();
$order = $orderService->findOrCreateOpenedOrder($user);


// Update the cart (quantities / remove from list)
if (isset($_POST["updateCart"])) {
    $orderFurnitures = $orderService->findAllOrderFurnitures($order);
    foreach ($orderFurnitures as $orderFurniture) {
        if (isset($_POST["quantity_" . $orderFurniture->id])) {
            $newQuantity = $_POST["quantity_" . $orderFurniture->id];
            if ($newQuantity > 0)
                $orderService->updateOrderFurnitureQuantity($orderFurniture, $newQuantity);
            if ($newQuantity <= 0)
                $orderService->removeFurnitureQuantity($orderFurniture);
        }
        if (isset($_POST["remove_" . $orderFurniture->id]))
            $orderService->removeFurnitureQuantity($orderFurniture);
    }
}


$order = $orderService->findOrCreateOpenedOrder($user);
$tpl->assign("user", $user);
$tpl->assign("order", $order);
$tpl->assign("totalPrice", $orderService->getTotalOrderPrice($order));
$tpl->assign("furnitureService", $furnitureService);
$tpl->assign("orderFurnitures", $orderService->findAllOrderFurnitures($order));

