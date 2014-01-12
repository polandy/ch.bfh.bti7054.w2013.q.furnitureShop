<?php

namespace service;

class PDFOrderService extends \FPDF
{
// Page header
    function Header()
    {
        $msgSrv = MsgService::getInstance();
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30, 10, $msgSrv->getName("pdf_title"));
        // Line break
        $this->Ln(20);
    }

    function OrderHeader($order, $user)
    {
        $this->SetFont('Arial', '', 15);
        $msgSrv = MsgService::getInstance();

        $this->Cell(200, 7, "Name lastname");
        $this->Ln(5);
        $this->Cell(200, 7, "Address");
        $this->Ln(5);
        $this->Cell(10, 7, "ZIP");
        $this->Cell(200, 7, "Place");
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 7, $msgSrv->getName("pdf_orderDate"));
        $this->SetFont('Arial', '', 15);
        $this->Cell(40, 7, "03.01.2012");
        $this->Ln(20);
    }

    // Simple table
    function FurnitureTable($data)
    {
        $msgSrv = MsgService::getInstance();
        // Header
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 7, $msgSrv->getName("pdf_furniture"), 1);
        $this->Cell(40, 7, $msgSrv->getName("pdf_feature"), 1);
        $this->Cell(40, 7, $msgSrv->getName("pdf_quantity"), 1);
        $this->Cell(40, 7, $msgSrv->getName("pdf_price"), 1);
        $this->SetFont('Arial', '', 15);
        $this->Ln();
        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

    function OrderFooter($order)
    {
        $msgSrv = MsgService::getInstance();

        $this->SetFont('Arial', 'B', 15);
        $this->Ln(15);
        $this->Cell(80);
        $this->Cell(40, 7, $msgSrv->getName("pdf_totalPrice"));
        $this->Cell(40, 7, "450.50 CHF");
    }

// Page footer
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

