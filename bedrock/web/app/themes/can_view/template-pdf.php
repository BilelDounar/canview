<?php
require('fpdf/fpdf.php');

class PDF extends FPDF{
    function BanderoleGauche(){
        $this->setFillColor(150,210,217);
        $this->rect(0,0,75,$this->h,'F');
        $this->Image('asset/img/photo_profil.jpg',7.5,7.5,60,65,'JPG');
    }

    function HeaderCV()
    {
        global $prenom;
        global $nom;
        $this->setFillColor(135,170,202);
        $this->rect(80,0,$this->h,72.5,'F');

        $this->SetFont('Arial','B',15);
        $w = $this->GetStringWidth($prenom)+6;
        $this->SetXY(85,20);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,0,$prenom,0,1,'C');

        $w = $this->GetStringWidth($nom)+6;
        $this->SetXY(85,30);
        $this->SetTextColor(255,255,255);
        $this->Cell(0,0,$nom,0,1,'C');
    }
}


$pdf = new PDF();
$prenom='Theo';
$nom='DEGREMONT';
$pdf->addPage();
$pdf->BanderoleGauche();
$pdf->HeaderCV();
$pdf->Output();
