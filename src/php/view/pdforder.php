<?php
require_once '../Autoloader.class.php';
new Autoloader();

// Instanciation of inherited class
$pdf = new \service\PDFOrderService();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$order = null;
$user = null;
$pdf->OrderHeader($order, $user);
$pdf->FurnitureTable(array(array("CH", "BE", "WK", 1)));
$pdf->OrderFooter($order);
//for($i=1;$i<=40;$i++)
//$pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();