<?php

namespace service;

/**
 * Class PDFOrderService
 * @package service
 * Service Class for handling PDF generation
 */
class PDFOrderService extends \FPDF
{
    /**
     * Page Header
     */
    function Header()
    {
        $msgSrv = MsgService::getInstance();
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell( 40, 40, $this->Image("images/logo.gif", $this->GetX(), $this->GetY(), 40), 0, 0, 'L', false );
        $this->Cell(5);
        // Title
        $this->Cell(30, 10, utf8_decode("Möbius Furniturus - " . $msgSrv->getName("pdf_title")));
        // Line break
        $this->Ln(20);
    }

    /**
     * Display the Company Contact information and the receiver contact information
     * @param $order which should be printed
     * @param $user customer of the order for contact informations
     */
    function OrderHeader($order, $user)
    {
        $msgSrv = MsgService::getInstance();

        $this->Cell(200, 7, utf8_decode("Möbius Furniturus, Inc. "));
        $this->Ln(5);
        $this->Cell(200, 7, utf8_decode("Furnitinitystreet 8"));
        $this->Ln(5);
        $this->Cell(10, 7, utf8_decode("3006 Berne"));
        $this->Ln(5);
        $this->Cell(10, 7, utf8_decode("Tel: 031 563 65 32"));
        $this->Ln(5);
        $this->Cell(10, 7, utf8_decode("Fax: 031 563 65 33"));
        $this->Ln(15);

        $this->Cell(200, 7, utf8_decode($user->firstName . " " . $user->lastName));
        $this->Ln(5);
        $this->Cell(200, 7, utf8_decode($user->address));
        $this->Ln(5);
        $this->Cell(10, 7, utf8_decode($user->zip . " " . $user->place));
        $this->Ln(5);
        $this->Cell(10, 7, utf8_decode($user->tel));
        $this->Ln(15);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 7, $msgSrv->getName("pdf_orderDate"));
        $this->SetFont('Arial', '', 15);
        $this->Cell(40, 7, $order->orderDate);
        $this->Ln(20);
    }

    /**
     * Generates a table based on the given orderFurnitures object
     * @param $orderFurnitures object
     */
    function FurnitureTable($orderFurnitures)
    {
        $msgSrv = MsgService::getInstance();
        $furnitureService = FurnitureService::getInstance();

        // Header
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 7, utf8_decode($msgSrv->getName("pdf_furniture")), 1);
        $this->Cell(40, 7, utf8_decode($msgSrv->getName("pdf_feature")), 1);
        $this->Cell(40, 7, utf8_decode($msgSrv->getName("pdf_quantity")), 1);
        $this->Cell(40, 7, utf8_decode($msgSrv->getName("pdf_price")), 1);
        $this->SetFont('Arial', '', 15);
        $this->Ln();
        // Data
        foreach ($orderFurnitures as $orderFurniture) {
            $furnitue = $furnitureService->findFurnitureById($orderFurniture->furnitureId);
            $feature = $furnitureService->findFeatureById($orderFurniture->featureId);
            $price = $orderFurniture->quantity * ($furnitue->basicPrice + ($feature == null ? 0 : $feature->extraPrice));

            $this->Cell(40, 6, utf8_decode($msgSrv->getName($furnitue)), 1);
            $this->Cell(40, 6, utf8_decode($msgSrv->getName($feature)), 1);
            $this->Cell(40, 6, $orderFurniture->quantity, 1);
            $this->Cell(40, 6, utf8_decode(number_format($price, 2, "'", "."))." CHF", 1);
            $this->Ln();
        }
    }

    /**
     * Generates the order footer of the document
     * @param $totalPrice
     */
    function OrderFooter($totalPrice)
    {
        $msgSrv = MsgService::getInstance();

        $this->SetFont('Arial', 'B', 15);
        $this->Ln(15);
        $this->Cell(80);
        $this->Cell(40, 7, $msgSrv->getName("pdf_totalPrice"));
        $this->Cell(40, 7, utf8_decode(number_format($totalPrice, 2, "'", ".")) . " CHF");
    }

    /**
     * generates the page footer
     */
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

