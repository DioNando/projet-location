<?php // content="text/plain; charset=utf-8"
include('../connexion/connexion.php');
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');

$sql = $bdd->query("SELECT *, COUNT(table_louer.ID_Locataire) AS Effectif, SUM(Loyer*NbJour) AS Total FROM table_locataire, table_voiture, table_louer WHERE (table_locataire.ID_Locataire = table_louer.ID_Locataire) AND (table_voiture.ID_Voiture = table_louer.ID_Voiture) GROUP BY table_louer.ID_Voiture");
$datay=array();
$datax=array();

while ($donnee1 = $sql->fetch()) {
    $datay[]=$donnee1['Effectif'];
}

while ($donnee2 = $sql->fetch()) {
    $datax[]=$donnee2['Voiture'];
}


// Create the graph. These two calls are always required
$graph = new Graph(1300,500,"auto");
$graph->SetScale('textlin');
 
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

// Adjust the margin a bit to make more room for titles
$graph->img->SetMargin(40,30,40,50);
$graph->SetBox(false);


// Create a bar pot
$bplot = new BarPlot($datay);
$fcol='#006d77';


$bplot->SetColor($fcol);
$graph->Add($bplot);

// Setup the titles
//$graph->title->Set('A basic bar graph');
//$graph->title->Set("Histogramme");
//$graph->xaxis->title->Set('Voitures');
//$graph->yaxis->title->Set('Effectifs');


$graph->xaxis->SetTickLabels($datax);
// $graph->xaxis->SetLabelAngle(50);
$graph->xaxis->SetTextTickInterval(1);

$graph->yaxis->scale->SetGrace(10);

// Display the graph
$graph->Stroke();
?>