<?php
/*
 * Controller for showcart
 */
// import the TemplateEngine Object
global $tpl;

// if user is not logged in redirect him to 403
$config = Config::getInstance();
$user = $config->getUser();
if ($user == null)
    header("Location: index.php?pageId=403");

// services
$orderService = \service\OrderService::getInstance();
$furnitureService = \service\FurnitureService::getInstance();
$order = $orderService->findOrCreateOpenedOrder($user);

// Update the cart (quantities / remove from list)
if (isset($_POST["updateCart"])) {
    $orderFurnitures = $orderService->findAllOrderFurnitures($order);
    foreach ($orderFurnitures as $orderFurniture) {
        // Update the quantity
        if (isset($_POST["quantity_" . $orderFurniture->id])) {
            $newQuantity = $_POST["quantity_" . $orderFurniture->id];
            if ($newQuantity > 0)
                $orderService->updateOrderFurnitureQuantity($orderFurniture, $newQuantity);
            if ($newQuantity <= 0)
                $orderService->removeFurnitureQuantity($orderFurniture);
        }
        // Remove a OrderFurniture
        if (isset($_POST["remove_" . $orderFurniture->id]))
            $orderService->removeFurnitureQuantity($orderFurniture);
    }
// Emtpy the cart
}elseif(isset($_POST["clearCart"])){
    $orderService->clearOrder($order);
}

// Set view variables
$order = $orderService->findOrCreateOpenedOrder($user);
$tpl->assign("user", $user);
$tpl->assign("order", $order);
$tpl->assign("totalPrice", $orderService->getTotalOrderPrice($order));
$tpl->assign("furnitureService", $furnitureService);
$orderFurnitures = $orderService->findAllOrderFurnitures($order);
$tpl->assign("orderFurnitures", $orderFurnitures);
$tpl->assign("isEmpty", sizeof($orderFurnitures)<=0);

