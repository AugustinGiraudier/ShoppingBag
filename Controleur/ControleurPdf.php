<?php 

/**
 * Classe de test de la facture PDF.
 * 
 * @author Augustin GIRAUDIER & Arthur SECHE-CABOT
 */

require_once './Ressources/fpdf184/fpdf.php';

class PDF extends FPDF
{
    // En-tête
    public function Header()
    {
        // Logo
        // $this->Image('header.png',55,12,100);
        // // Saut de ligne
        // $this->Ln(30);
    }   

// Pied de page
    public function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 10
        $this->SetFont('Times','I',10);
        // Numéro de page
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
// Instanciation du PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Bloc 1
$pdf->SetFont('Times','',14);
$pdf->SetTextColor(0,0,0);
$txt1 = "Facture de la commande";
$txt1 = utf8_decode($txt1);
$pdf->Multicell(190,10,$txt1,0,'C', TRUE);
// Saut de lignes
$pdf->Ln(5);

// Bloc 2
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(192,192,192);
$pdf->SetTextColor(0,0,0);
$txt2 = "BURG'";
$txt2 = utf8_decode($txt2);
$pdf->Multicell(190,10,$txt2,0,'R', TRUE);

// Saut de lignes
$pdf->Ln(10);

// Bloc 3
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(192,192,192);
$pdf->SetTextColor(0,0,0);
$txt3 = "Texte 3 en Times 12 centré.";
$txt3 = utf8_decode($txt3);
$pdf->Multicell(190,10,$txt3,0,'C', TRUE);

// Création du PDF
$fichier ="fichier.pdf";
$pdf->Output($fichier,'F');

// Redirection vers le PDF
header('/Ressources/fichier.pdf');

?>