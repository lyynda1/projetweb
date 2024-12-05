<?php
include '../../../controller/ProduitC.php';


$message = "" ;
$ProduitC = new ProduitC();

$ProduitC->SupprimerProduit($_GET["idProduit"]);
header('Location:AfficherProduits.php');

?>