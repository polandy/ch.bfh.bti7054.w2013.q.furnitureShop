<?php
require_once '../Autoloader.class.php';
new Autoloader();

$orderService = \service\OrderService::getInstance();
$userService = \service\UserService::getInstance();
$order = $orderService->findOrderById(1);
$user = $userService->findUserById($order->userId);
$orderFurnitures = $orderService->findAllOrderFurnitures($order);

// Instanciation of inherited class
$pdf = new \service\PDFOrderService();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->OrderHeader($order, $user);
$pdf->FurnitureTable($orderFurnitures);
$pdf->OrderFooter($orderService->getTotalOrderPrice($order));
//for($i=1;$i<=40;$i++)
//$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();