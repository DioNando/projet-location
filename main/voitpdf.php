<?php
	include('../connexion/connexion.php');
	require("fpdf/fpdf.php");
	class myPDF extends FPDF{
		function header(){
			$this->SetFont('Arial','B',14);
			$this->Cell(276,5,'TABLE DES VOITURES QUI ONT ETE LOUER',0,0,'C');
			$this->Ln(10);
			$this->SetFont('Times','',12);
			$this->Cell(276,5,'Liste voiture',0,0,'C');
			$this->Ln(20);
		}
		function footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','',8);
			$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
		}
		function headerTable(){
			$this->SetFont('Times','B',12);
			$this->Cell(90,10,'VOITURE',1,0,'C');
			$this->Cell(100,10,'EFFECTIF',1,0,'C');;
			$this->Cell(80,10,'MONTANT',1,0,'C');
			$this->Ln();
		}
		function viewTable($bdd){
			$this->SetFont('Times','',12);
			$sql = $bdd->query("SELECT *, CONCAT(Voiture, ' ', table_louer.ID_Voiture) AS VoitureID, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) GROUP BY table_louer.ID_Voiture");
			while ($donnees = $sql->fetch()) {
				$this->Cell(90,10,$donnees['VoitureID'],1,0,'C');
				$this->Cell(100,10,$donnees['Effectif'],1,0,'C');
				$this->Cell(80,10,$donnees['Total'],1,0,'C');
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