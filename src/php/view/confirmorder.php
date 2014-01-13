<?php
global $tpl;


$config = Config::getInstance();
$user = $config->getUser();
if ($user == null)
    header("Location: index.php?pageId=403");

$orderService = \service\OrderService::getInstance();
$paymentMethodService = \service\PaymentMethodService::getInstance();
$order = $orderService->findOrCreateOpenedOrder($user);


// Order has been confirmed
if (isset($_POST["orderNow"])) {
    $paymentMethod = $paymentMethodService->findPaymentMethodById($_POST["paymentmethod"]);
    if ($paymentMethod != null)
        $orderService->confirmOrder($order, $paymentMethod);
}


$order = $orderService->findOrCreateOpenedOrder($user);
$tpl->assign("user", $user);
$tpl->assign("order", $order);
$tpl->assign("paymentMethods", $paymentMethodService->getAllPaymentMethods());
$tpl->assign("totalPrice", $orderService->getTotalOrderPrice($order));
$tpl->assign("orderFurnitures", $orderService->findAllOrderFurnitures($order));

