<?php
	include('../connexion/connexion.php');
	require("fpdf/fpdf.php");
	class myPDF extends FPDF{
		function header(){
			$this->SetFont('Arial','B',14);
			$this->Cell(276,5,'TABLE DES LOCATAIRES QUI ONT LOUE UNE VOITURE',0,0,'C');
			$this->Ln(10);
			$this->SetFont('Times','',12);
			$this->Cell(276,5,'Liste locataire',0,0,'C');
			$this->Ln(20);
		}
		function footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
		}
		function headerTable(){
			$this->SetFont('Times','B',12);
			$this->Cell(40,10,'LOCATAIRE',1,0,'C');
			$this->Cell(60,10,'DATE',1,0,'C');
			$this->Cell(60,10,'LOYER',1,0,'C');
			$this->Cell(60,10,'NB_JOUR',1,0,'C');
			$this->Cell(60,10,'MONTANT',1,0,'C');
			$this->Ln();
		}
		function viewTable($bdd){
			$this->SetFont('Times','',12);
			$sql = $bdd->query("SELECT Nom, NbJour, Loyer, DATE_FORMAT(Date_Location, '%d %b %Y') AS Date_Location, (Loyer*NbJour) AS Montant FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) ORDER BY Nom");
			while ($donnees = $sql->fetch()) {
				$this->Cell(40,10,$donnees['Nom'],1,0,'C');
				$this->Cell(60,10,$donnees['Date_Location'],1,0,'C');
				$this->Cell(60,10,$donnees['Loyer'],1,0,'C');
				$this->Cell(60,10,$donnees['NbJour'],1,0,'C');
				$this->Cell(60,10,$donnees['Montant'],1,0,'C');
				$this->Ln();
			}
		}
	}

	$pdf = new myPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage('L','A4',0);
	$pdf->headerTable();
	$pdf->viewTable($bdd);
	$pdf->Output();
?>