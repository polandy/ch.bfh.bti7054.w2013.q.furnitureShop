<?php
/**
 * Controller of confirmorder
 */

// Import TemplateEngine Object
global $tpl;

// if user is not logged in, redirect him
$config = Config::getInstance();
$user = $config->getUser();
if ($user == null)
    header("Location: index.php?pageId=403");

// services
$orderService = \service\OrderService::getInstance();
$paymentMethodService = \service\PaymentMethodService::getInstance();
$order = $orderService->findOrCreateOpenedOrder($user);

// only continue if there are some orderFurnitures
if (sizeof($orderService->findAllOrderFurnitures($order)) <= 0)
    header("Location: index.php?pageId=5");

// Order has been confirmed
if (isset($_POST["orderNow"])) {
    $paymentMethod = $paymentMethodService->findPaymentMethodById($_POST["paymentmethod"]);
    if ($paymentMethod != null && sizeof($orderService->findAllOrderFurnitures($order)) > 0) {
        $orderService->confirmOrder($order, $paymentMethod);
        header("Location: ./index.php?pageId=7");
    }
}

// assign variables for usage in view
$order = $orderService->findOrCreateOpenedOrder($user);
$tpl->assign("user", $user);
$tpl->assign("order", $order);
$tpl->assign("paymentMethods", $paymentMethodService->getAllPaymentMethods());
$tpl->assign("totalPrice", $orderService->getTotalOrderPrice($order));
$tpl->assign("orderFurnitures", $orderService->findAllOrderFurnitures($order));

